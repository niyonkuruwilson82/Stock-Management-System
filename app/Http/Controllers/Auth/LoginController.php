<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login'); // create this view
    }

    public function login(Request $request)
    {
        $credentials = $request->only('UserName', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('/products');
        }

        return back()->withErrors(['UserName' => 'Invalid credentials']);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login');
    }
}

