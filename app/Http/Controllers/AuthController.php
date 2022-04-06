<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function index() {
        if (Auth::user()) {
            return redirect('/');
        }
        
        $data = [
            'title' => 'Login Page'
        ];

        return view('forum.login', $data);
    }

    public function doLogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);
        if(Auth::attempt($credentials)) {
            $request->session()->regenerate(); 
            return redirect()->intended('/')->with('success', 'Login Success!');
        }

        return back()->with('loginError', 'Login failed!');
    }

    public function doLogout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('success', 'Logout Success!');
    }
}
