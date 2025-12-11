<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        //Простая валидация
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Попытка авторизации
        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect('/admin');
        }

        return redirect()->back()->withErrors([
            'email' => 'Неверный email или пароль',
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

}
