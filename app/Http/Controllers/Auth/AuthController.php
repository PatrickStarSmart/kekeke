<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        if (Auth::attempt([
            'username' => $request->input('username'),
            'password' => $request->input('password'),
            'role' => 'admin',
            ])) {
            return redirect()->route('products')->with('success', 'Login successfully');
        }
    }

    public function logout()
    {
        return redirect()->route('')->with('success', 'Logout successfully');
    }
}
