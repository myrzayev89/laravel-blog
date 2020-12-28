<?php

namespace App\Http\Controllers\security;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLogin;
use App\Http\Requests\StoreRegister;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function registerForm()
    {
        return view('front.user.register');
    }

    public function register(StoreRegister $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);
        Auth::login($user);
        return redirect()->route('admin.index')->with('success', 'Xos Geldin Admin');
    }

    public function loginForm()
    {
        return view('front.user.login');
    }

    public function login(StoreLogin $request)
    {
        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ])) {
            if (Auth::user()->is_admin) {
                return redirect()->route('admin.index');
            } else {
                return redirect()->home();
            }
        }
        return redirect()->back()->with('error', 'Email və ya Şifrə yanlışdır!');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->home();
    }
}
