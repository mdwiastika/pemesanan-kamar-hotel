<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        return view('admin.auth.login', [
            'title' => 'FORM LOGIN',
        ]);
    }
    public function register(Request $request)
    {
        return view('admin.auth.register', [
            'title' => 'FORM REGISTER',
        ]);
    }
    public function postLogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }
    }
    public function postRegister(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
        ]);
        $validatedData['password'] = Hash::make($request->password);
        $user = User::count();
        if ($user == 0) {
            $validatedData['role'] = 'admin';
        } else {
            $validatedData['role'] = 'user';
        }
        User::create($validatedData);
        return redirect('/login')->with('message', 'Sukses register user');
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
