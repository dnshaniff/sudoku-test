<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index()
    {
        if (auth()->check()) {
            return redirect()->back();
        }

        return view('login');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->only('name', 'password');

        if (Auth::attempt($credentials))
        {
            return redirect()->intended('/');
        }

        return redirect()->back()->withErrors(trans('auth.failed'));
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();

        return redirect()->route('login.index')->with('success', 'You have been successfully logged out');
    }
}
