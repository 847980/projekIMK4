<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller{
    
    public function loginView(){
        $data['title'] = 'Login Admin';
        return view('admin.login', $data);
    }

    public function login(Request $request){
        $data = $request->only('email', 'password');
        $credentials = Validator::make($data, [
            'email' => 'required|email:dns',
            'password' => 'required',
        ])->validate(); 
        
        // cek apakah email dan password benar
        if(Auth::guard('admin')->attempt($credentials)){
            return redirect()
            ->route('admin.dashboard')
            ->with('success', 'Login berhasil');
        }

        // jika salah
        return redirect()
        ->back()
        ->with('error', 'Email atau password salah');
    }
    
}
