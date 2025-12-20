<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    /* =====================================================
     | API REGISTER (Sanctum)
     ===================================================== */
    public function register(Request $request)
    {
        $data = $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:6'
        ]);

        $user = User::create([
            'name'     => $data['name'],
            'email'    => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        return response()->json([
            'token' => $user->createToken('auth_token')->plainTextToken,
            'user'  => $user
        ], 201);
    }

    /* =====================================================
     | API LOGIN (Sanctum)
     ===================================================== */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required'
        ]);

        if (!Auth::attempt($credentials)) {
            return response()->json([
                'message' => 'Email atau password salah'
            ], 401);
        }

        $user = $request->user();

        return response()->json([
            'token' => $user->createToken('auth_token')->plainTextToken,
            'user'  => $user
        ]);
    }

    /* =====================================================
     | API LOGOUT (Sanctum)
     ===================================================== */
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'Logout berhasil'
        ]);
    }

    /* =====================================================
     | WEB AUTH (Blade)
     ===================================================== */
    public function showLogin()
    {
        return view('auth.login');
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    public function loginWeb(Request $request)
    {
        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required'
        ]);

        if (!Auth::attempt($credentials, $request->boolean('remember'))) {
            return back()
                ->withErrors(['email' => 'Email atau password salah'])
                ->withInput();
        }

        $request->session()->regenerate();

        return redirect()->route('kendaraan.index');
    }

    public function logoutWeb(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
