<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DescanGuidebook extends Model
{
    protected $table = 'descan_guidebooks';

    protected $fillable = [
        'judul',
        'kategori',
        'kode_referensi',
        'deskripsi',
        'file_path',
        'file_name',
        'file_ext',
        'file_size',
        'uploaded_by',
    ];
}