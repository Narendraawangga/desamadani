<?php

namespace App\Http\Controllers;

use App\Models\DescanGuidebook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DescanGuidebookController extends Controller
{
    private const DISK = 'public';
    private const FOLDER = 'descan-guidebooks';

    private const KATEGORI = [
        'panduan_teknis'  => 'Panduan Teknis',
        'modul_statistik' => 'Modul Statistik',
        'rumus'           => 'Rumus & Formula',
        'regulasi'        => 'Regulasi / SK',
        'lainnya'         => 'Lainnya',
    ];

    /** Hanya Admin BPS (login Laravel) yang boleh mengunggah / menghapus. */
    private function canManage(Request $request): bool
    {
        $user = $request->user();
        return $user !== null && $user->isAdmin();
    }

    private function formatSize(int $bytes): string
    {
        if ($bytes >= 1048576) {
            return number_format($bytes / 1048576, 1, ',', '.') . ' MB';
        }
        return max(1, (int) round($bytes / 1024)) . ' KB';
    }

    private function present(DescanGuidebook $b): array
    {
        return [
            'id'             => $b->id,
            'judul'          => $b->judul,
            'kategori'       => $b->kategori,
            'kategori_label' => self::KATEGORI[$b->kategori] ?? 'Lainnya',
            'kode_referensi' => $b->kode_referensi,
            'deskripsi'      => $b->deskripsi,
            'file_name'      => $b->file_name,
            'ext'            => $b->file_ext,
            'ukuran'         => $this->formatSize((int) $b->file_size),
            'tanggal'        => $b->created_at ? $b->created_at->format('d/m/Y') : '',
            'view_url'       => $b->file_ext === 'pdf' ? route('descan.guidebooks.view', $b->id) : null,
            'download_url'   => route('descan.guidebooks.download', $b->id),
        ];
    }

    /** Daftar buku panduan (publik). */
    public function index(Request $request)
    {
        $items = DescanGuidebook::orderByDesc('created_at')->get();
        $data = [];
        foreach ($items as $item) {
            $data[] = $this->present($item);
        }

        return response()->json([
            'data'       => $data,
            'can_manage' => $this->canManage($request),
        ]);
    }

    /** Unggah buku panduan baru (khusus Admin BPS). */
    public function store(Request $request)
    {
        if (!$this->canManage($request)) {
            return response()->json(['message' => 'Hanya Admin BPS yang dapat menambah buku panduan.'], 403);
        }

        $validated = $request->validate([
            'judul'          => ['required', 'string', 'max:150'],
            'kategori'       => ['required', 'in:' . implode(',', array_keys(self::KATEGORI))],
            'kode_referensi' => ['nullable', 'string', 'max:80'],
            'deskripsi'      => ['nullable', 'string', 'max:500'],
            'file'           => ['required', 'file', 'max:10240', 'mimes:pdf,doc,docx,xls,xlsx,ppt,pptx'],
        ], [
            'judul.required' => 'Judul buku wajib diisi.',
            'file.required'  => 'Pilih berkas yang akan diunggah.',
            'file.max'       => 'Ukuran berkas maksimal 10 MB.',
            'file.mimes'     => 'Format berkas harus PDF, Word, Excel, atau PowerPoint.',
            'file.uploaded'  => 'Berkas gagal diunggah. Periksa batas upload_max_filesize di php.ini.',
        ]);

        $file = $request->file('file');
        $path = $file->store(self::FOLDER, self::DISK);

        $book = DescanGuidebook::create([
            'judul'          => $validated['judul'],
            'kategori'       => $validated['kategori'],
            'kode_referensi' => $validated['kode_referensi'] ?? null,
            'deskripsi'      => $validated['deskripsi'] ?? null,
            'file_path'      => $path,
            'file_name'      => Str::limit(basename($file->getClientOriginalName()), 140, ''),
            'file_ext'       => strtolower($file->getClientOriginalExtension()),
            'file_size'      => $file->getSize(),
            'uploaded_by'    => $request->user()->id,
        ]);

        return response()->json(['message' => 'Buku panduan berhasil ditambahkan.', 'data' => $this->present($book)], 201);
    }

    /** Hapus buku panduan beserta berkasnya (khusus Admin BPS). */
    public function destroy(Request $request, DescanGuidebook $guidebook)
    {
        if (!$this->canManage($request)) {
            return response()->json(['message' => 'Hanya Admin BPS yang dapat menghapus buku panduan.'], 403);
        }

        Storage::disk(self::DISK)->delete($guidebook->file_path);
        $guidebook->delete();

        return response()->json(['message' => 'Buku panduan dihapus.']);
    }

    /** Unduh berkas (publik). */
    public function download(DescanGuidebook $guidebook)
    {
        abort_unless(Storage::disk(self::DISK)->exists($guidebook->file_path), 404);

        return Storage::disk(self::DISK)->download(
            $guidebook->file_path,
            Str::slug($guidebook->judul) . '.' . $guidebook->file_ext
        );
    }

    /** Buka PDF langsung di browser (publik). Format lain diunduh. */
    public function view(DescanGuidebook $guidebook)
    {
        abort_unless(Storage::disk(self::DISK)->exists($guidebook->file_path), 404);

        if ($guidebook->file_ext !== 'pdf') {
            return redirect()->route('descan.guidebooks.download', $guidebook->id);
        }

        return response()->file(Storage::disk(self::DISK)->path($guidebook->file_path), [
            'Content-Type'        => 'application/pdf',
            'Content-Disposition' => 'inline; filename="' . Str::slug($guidebook->judul) . '.pdf"',
        ]);
    }
}