<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    //Register
    public function registerIndex()
    {
        $data['title'] = 'Register';
        return view('register', $data);
    }

    public function register(Request $request){
        // validasi form peserta
        $request = $request->only('username', 'email', 'password');
        $validated = Validator::make($request, [
            'username' => 'required|min:3|max:50|unique:users',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:8|max:50',
        ])->validate(); 

        // sama aja kayak hash::make("llalal")
        $validated['password'] = bcrypt($validated['password']);

        // simpan ke database
        User::create($validated);

        // redirect ke halaman login
        return redirect()
        ->route('login.index')
        ->with('success', 'Register berhasil, silahkan login');
    }




    // Login
    public function loginIndex()
    {
        $data['title'] = 'Login';
        return view('login');
    }

    public function login(Request $request){
        // validasi form peserta
        $data = $request->only('email', 'password');
        $credentials = Validator::make($data, [
            'email' => 'required|email:dns',
            'password' => 'required',
        ])->validate(); 

        // cek apakah email dan password benar
        if(Auth::attempt($credentials)){
            // jika benar, redirect ke halaman dashboard
            $request->session()->regenerate();

            return redirect()
            ->intended(route('user.dashboard'))
            ->with('success', 'Login berhasil');
        }

        // jika salah, redirect ke halaman login
        return back()
        ->with('error','email atau password salah')
        ->onlyInput('email');

    }

    public function logout(Request $request){
        Auth::logout();
 
        $request->session()->invalidate();
     
        $request->session()->regenerateToken();
     
        return redirect('/');
    }
}
