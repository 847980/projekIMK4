<?php

use App\Http\Controllers\Auth\AdminAuthController;
use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// user login dan register
    Route::middleware('guest')->group(function(){
        Route::get('/login', [AuthController::class, 'loginIndex'])->name('login.index');
        Route::post('/login', [AuthController::class, 'login'])->name('login.send');
    });
    Route::get('/register', [AuthController::class, 'registerIndex'])->name('register.index');
    Route::post('/register', [AuthController::class, 'register'])->name('register.send');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// user sudah login
Route::group(['as'=> 'user.', 'prefix' => 'user', 'middleware'=>'auth'], function(){
    //dashboard
    Route::get('/dashboard', function () {
        $data['title'] = 'Dashboard';
        return view('dashboard', $data);
    })->name('dashboard');
    
        
});



// admin
    // login admin
    Route::get('/login', [AdminAuthController::class, 'loginView'])->name('admin.login.index');
    Route::post('/login', [AdminAuthController::class, 'login'])->name('admin.login.send');

// admin sudah login
Route::group(['as'=> 'admin.', 'prefix' => 'admin', 'middleware'=>'auth:admin'], function(){
    Route::get('/dashboard', function () {
        $data['title'] = 'Dashboard';
        return view('admin.index', $data);
    })->name('dashboard');

    Route::get('/logout', [AdminAuthController::class, 'logout'])->name('logout');
        
});
