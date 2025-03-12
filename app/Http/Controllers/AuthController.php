<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    // Menampilkan halaman login
    public function login()
    {
        return view('auth.login');
    }

    // Proses login
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Redirect berdasarkan role
            return Auth::user()->role === 'admin'
                ? redirect()->route('admin.devices.index')
                : redirect()->route('user.dashboard');
        }

        return back()->withErrors(['email' => 'Email atau password salah.'])->onlyInput('email');
    }

    // Menampilkan halaman register
    public function register()
    {
        return view('auth.register');
    }

    // Proses register
    public function registervalidate(Request $request)
    {
        // dd($request->all()); // Debugging: lihat data yang dikirim

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Hash password dengan benar
            'role' => 'user', // Default role user
        ]);
        // dd($request); // Debugging: lihat apakah user berhasil dibuat
        return redirect()->route('login')->with('success', 'Registrasi berhasil. Silakan login.');
    }

    // Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
