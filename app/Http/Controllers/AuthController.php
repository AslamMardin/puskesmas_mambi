<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function loginForm()
    {
        if (Auth::check()) {
            return redirect()->route('admin.welcome');
        } else {
            return view('login');
        }
    }

    public function login(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'password' => ['required'],
        ]);

        $data = [
            'name' => $request->input('name'),
            'password' => $request->input('password'),
        ];
        if (Auth::Attempt($data)) {
            return redirect()->route('admin.welcome');
        } else {
            Session::flash('error', 'Email atau Password Salah');
            return redirect()->route('login');
        }

    }

    public function actionlogout()
    {
        Auth::logout();
        return redirect('/');
    }

}
