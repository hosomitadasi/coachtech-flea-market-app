<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Http\Requests\LoginRequest as RequestsLoginRequest;

class AuthController extends Controller
{
    public function createRegister()
    {
        return view('auth.register');
    }

    public function createLogin()
    {
        return view('auth.login');
    }

    public function store(RegisterRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
    }

    public function login(LoginRequest $request) {}

    public function logout()
    {
        Auth::logout();
        return redirect('home');
    }
}
