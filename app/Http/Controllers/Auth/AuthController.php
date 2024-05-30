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
        return redirect()->route('login.index');
    }

    public function register(Request $request){
        // validasi form peserta
        $request = $request->only('username', 'email', 'password');
        $validated = Validator::make($request, [
            'username' => 'required|min:3|max:50|unique:users,username',
            'email' => 'required|email:dns|unique:users,email',
            'password' => 'required|min:5|max:50',
        ],
        // validation response
        [
            'username.required' => 'harus diisi',
            'username.min' => 'minimal 3 karakter',
            'username.max' => 'maksimal 50 karakter',
            'username.unique' => 'sudah terdaftar',
            'email.required' => 'harus diisi',
            'email.email' => 'harus email valid',
            'email.unique' => 'sudah terdaftar',
            'password.required' => 'harus diisi',
            'password.min' => 'minimal 5 karakter',
            'password.max' => 'maksimal 50 karakter',
        ]
        )->validate(); 

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
        $data = $request->only('username', 'password');
        $credentials = Validator::make($data, [
            // 'email' => 'required|email:dns',
            'username' => 'required',
            'password' => 'required',
            ])->validate(); 




        // cek apakah email dan password benar
        if(Auth::attempt($credentials)){
            // jika benar, redirect ke halaman dashboard
            $request->session()->regenerate();
            $request->session()->put('id', Auth::user()->id);

            return redirect()
            ->intended(route('user.dashboard'))
            ->with('success', 'Login berhasil');
        }

        // jika salah, redirect ke halaman login
        return back()
        ->with('error','Email atau password salah');

    }

    public function logout(Request $request){
        Auth::logout();
 
        $request->session()->invalidate();
     
        $request->session()->regenerateToken();
     
        return redirect('/');
    }
}
