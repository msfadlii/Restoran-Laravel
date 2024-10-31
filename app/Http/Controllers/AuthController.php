<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function indexLogin(){
        return view('auth/login');
    }

    public function register(Request $request){
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $user = User::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);

        return response()->json(['user' => $user], 201);
    }

    public function login(Request $request){
        // Ambil kredensial dari input
        $credentials = $request->only('username', 'password'); // Ganti 'email' dengan 'username'
        Log::info('Login attempt:', $credentials);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            Log::info('User logged in:', ['user' => $user]);

            $token = $request->user()->createToken('token')->plainTextToken; // Ganti $request->user() dengan $user
            return response()->json(['user' => $user, 'token' => $token]);
        }

        Log::warning('Unauthorized login attempt', $credentials);
        return response()->json(['message' => 'Unauthorized'], 401);
    }


    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
        Auth::logout();

        return response()->json(['message' => 'Successfully logged out']);
    }
}
