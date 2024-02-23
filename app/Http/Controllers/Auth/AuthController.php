<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

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
        ])) {
            if (Auth::user()->role == 'admin') {
                return redirect()->route('dashboard')->with('success', 'Login successfully');
            }
            return redirect()->route('list.products')->with('success', 'Login successfully');
        } else {
            return back();
        }
    }

    public function logout(Request $request)
    {
        return redirect()->route('login')->with('success', 'Logout successfully');
    }
}
