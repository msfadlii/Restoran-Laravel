<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthenticateController extends Controller
{
    public function registerPost(Request $request) {
        $user = new User();
        $user->name = $request->name;
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->save();
        return back()->with('success', 'Register successfully');
    }

    public function login() {
        return view('auth/login');
    }
   
    public function loginPost(Request $request) {
        $credetials = [
        'username' => $request->username,
        'password' => $request->password,
        ];
        if (Auth::attempt($credetials)) {
            return redirect('/data-produk')->with('success', 'Login berhasil');
        }
        return back()->with('error', 'Username or Password salah');
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('login');
    }
}
