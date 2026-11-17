<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Handle user login authentication (Support form POST & AJAX/Fetch).
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'login' => ['required', 'string'],
            'password' => ['required', 'string'],
        ], [
            'login.required' => 'Email atau Username wajib diisi.',
            'password.required' => 'Kata sandi wajib diisi.',
        ]);

        $loginInput = trim($credentials['login']);
        $password = $credentials['password'];
        $remember = $request->boolean('remember', false);

        // Cari berdasarkan email atau nama
        $user = User::where('email', $loginInput)
            ->orWhere('name', $loginInput)
            ->first();

        if ($user && Hash::check($password, $user->password)) {
            Auth::login($user, $remember);
            $request->session()->regenerate();

            if ($request->expectsJson() || $request->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => "Selamat datang kembali, {$user->name}!",
                    'user' => [
                        'id' => $user->id,
                        'name' => $user->name,
                        'email' => $user->email,
                    ],
                    'redirect' => url('/admin'),
                ]);
            }

            return redirect()->intended(url('/admin'))->with('success', "Selamat datang kembali, {$user->name}!");
        }

        $errorMessage = 'Email / username atau kata sandi yang Anda masukkan salah.';

        if ($request->expectsJson() || $request->ajax()) {
            return response()->json([
                'success' => false,
                'message' => $errorMessage,
            ], 422);
        }

        return back()->withErrors(['login' => $errorMessage])->withInput($request->only('login'));
    }

    /**
     * Handle user logout.
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        if ($request->expectsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Anda telah berhasil keluar.',
                'redirect' => url('/portal'),
            ]);
        }

        return redirect('/portal')->with('info', 'Anda telah keluar dari sesi.');
    }

    /**
     * Check current authentication status.
     */
    public function checkAuth()
    {
        if (Auth::check()) {
            $user = Auth::user();
            return response()->json([
                'authenticated' => true,
                'user' => [
                    'id' => $user->id,
                    'name' => $user->name,
                    'email' => $user->email,
                ],
            ]);
        }

        return response()->json([
            'authenticated' => false,
        ]);
    }
}

