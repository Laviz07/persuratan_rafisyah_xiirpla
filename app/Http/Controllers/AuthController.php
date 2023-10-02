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

    public function check(Request $request)
    {
        $data = $request->validate();

        if (Auth::attempt($data)) {
            $request->session()->regenerate();
            return Auth::user();

            return response()->json([
                'errors' => [
                    'message' => 'Username or password wrong !'
                ]
            ], 401);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
