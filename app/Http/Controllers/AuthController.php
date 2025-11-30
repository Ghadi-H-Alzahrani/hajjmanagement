<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login'); // your login Blade
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Role-based redirect
            $user = Auth::user();
            switch ($user->role) {
                case 'admin':
                    return redirect()->intended('/admin/dashboard');
                case 'manager':
                    return redirect()->intended('/manager/dashboard');
                // case 'employee':
                //     return redirect()->intended('/employee/dashboard'); for later ----
                default:
                    Auth::logout();
                    return redirect('/login')->withErrors([
                        'email' => 'الدور غير معرف'
                    ]);
            }
        }

        return back()->withErrors([
            'email' => 'بيانات الدخول غير صحيحة',
        ])->withInput();
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
