<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    // ================= LOGIN VIEW =================
    public function showLogin()
    {
        return view('auth.login');
    }

    // ================= LOGIN PROCESS =================
    public function loginWeb(Request $request)
    {
        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            
            // Redirect to admin dashboard if user is admin
            if (auth()->user()->isAdmin()) {
                return redirect()->route('admin.dashboard');
            }
            
            return redirect()->route('kendaraan.index');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }

    // ================= REGISTER VIEW =================
    public function showRegister()
    {
        return view('auth.register');
    }

    // ================= REGISTER PROCESS =================
    public function registerWeb(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:100',
            'last_name'  => 'required|string|max:100',
            'email'      => 'required|email|unique:users,email',
            'password'   => 'required|min:6|confirmed',
        ]);

        $user = User::create([
            'name'     => $validated['first_name'].' '.$validated['last_name'],
            'email'    => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        Auth::login($user);

        return redirect()->route('kendaraan.index');
    }

    // ================= LOGOUT =================
    public function logoutWeb(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
