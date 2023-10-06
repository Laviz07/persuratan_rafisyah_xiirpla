<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserLoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    public function index()
    {
        if (!Auth::user()) {
            return view('auth.login');
        }

        return redirect()->to('/dashboard');
    }

    public function login(Request $request)
    {
        $data = $request->validate([
            'username' => ['required'],
            'password' => ['required']
        ]);

        if (Auth::attempt($data)) {
            $request->session()->regenerate();

            if (Auth::user()->role == 'admin') :
                return redirect()->to('/dashboard');
            else :
                return redirect()->to('/dashboard');
            endif;
        }
    }


    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
