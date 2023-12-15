<?php

use App\Http\Controllers\Auth\AdminAuthController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\CinemaController;
use App\Http\Controllers\ShowTimeController;
use App\Http\Controllers\StudioController;
use App\Models\Film;
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


    // for ajax
    // Route::post('/cinema/byCity', [CinemaController::class, 'getCinemaByCity'])->name('getCinema.byCity');
    // Route::post('/studio/byCinema', [StudioController::class, 'getStudioByCinema'])->name('getStudio.byCinema');


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
Route::middleware('guest:admin')->group(function(){
    Route::get('admin/login', [AdminAuthController::class, 'loginView'])->name('admin.login.index');
    Route::post('admin/login', [AdminAuthController::class, 'login'])->name('admin.login.send');
});

// admin sudah login
Route::group(['as'=> 'admin.', 'prefix' => 'admin', 'middleware'=>'auth:admin'], function(){
    Route::get('/dashboard', function () {
        $data['title'] = 'Dashboard';
        return view('admin.index', $data);
    })->name('dashboard');

    Route::get('/logout', [AdminAuthController::class, 'logout'])->name('logout');


    // CRUD Film
    Route::get('/film', [FilmController::class, 'index'])->name('film.index');
    Route::get('/film/create', [FilmController::class, 'create'])->name('film.create');
    Route::post('/film/create', [FilmController::class, 'store'])->name('film.store');
    Route::get('/film/{id}/edit', [FilmController::class, 'edit'])->name('film.edit');
    Route::put('/film/{id}/edit', [FilmController::class, 'update'])->name('film.update');
    Route::delete('/film/{id}/delete', [FilmController::class, 'destroy'])->name('film.destroy');


    // CRUD ShowTime
    Route::get('/showtime', [ShowTimeController::class, 'index'])->name('showtime.index');
    Route::get('/showtime/create', [ShowTimeController::class, 'create'])->name('showtime.create');
    Route::post('/showtime/create', [ShowTimeController::class, 'store'])->name('showtime.store');
    Route::get('/showtime/{id}/edit', [ShowTimeController::class, 'edit'])->name('showtime.edit');
    Route::put('/showtime/{id}/edit', [ShowTimeController::class, 'update'])->name('showtime.update');
    Route::delete('/showtime/{id}/delete', [ShowTimeController::class, 'destroy'])->name('showtime.destroy');

    // CRUD Cinema
    Route::get('/cinema', [CinemaController::class, 'index'])->name('cinema.index');
    Route::get('/cinema/create', [CinemaController::class, 'create'])->name('cinema.create');
    Route::post('/cinema/create', [CinemaController::class, 'store'])->name('cinema.store');
    Route::get('/cinema/{id}/edit', [CinemaController::class, 'edit'])->name('cinema.edit');
    Route::put('/cinema/{id}/edit', [CinemaController::class, 'update'])->name('cinema.update');
    Route::delete('/cinema/{id}/delete', [CinemaController::class, 'destroy'])->name('cinema.destroy');


});


