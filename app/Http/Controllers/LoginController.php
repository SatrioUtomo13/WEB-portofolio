<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login'); // show login form
    }

    public function authenticate(Request $request)
    {
        /* validate input user */
        $credentials = $request->validate([
            "email" => ['required', 'email:dns'], // email validation
            "password" => ['required'] // password required
        ]);

        /* authenticate user */
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate(); // regenerate session
            return redirect()->intended('/dashboard'); //redirect user if success
        }

        return back()->with('loginError', 'Login Failed'); // login failed
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
