<?php

use App\Models\Film;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CityController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\CinemaController;
use App\Http\Controllers\StudioController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\AdminAuthController;

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
    
    // CRUD Genre
    Route::get('/genre', [GenreController::class, 'index'])->name('genre.index');
    Route::post('/genre/create', [GenreController::class, 'store'])->name('genre.store');
    Route::put('/genre/{id}/edit', [GenreController::class, 'update'])->name('genre.update');
    Route::delete('/genre/{id}/delete', [GenreController::class, 'destroy'])->name('genre.destroy');

    // CRUD Studio
    Route::get('/studio', [StudioController::class, 'index'])->name('studio.index');
    Route::get('/studio/create', [StudioController::class, 'create'])->name('studio.create');
    Route::post('/studio/create', [StudioController::class, 'store'])->name('studio.store');
    Route::put('/studio/{id}/edit', [StudioController::class, 'update'])->name('studio.update');
    Route::delete('/studio/{id}/delete', [StudioController::class, 'destroy'])->name('studio.destroy');

    // CRUD Cinema
    Route::get('/cinema', [CinemaController::class, 'index'])->name('cinema.index');
    Route::get('/cinema/create', [CinemaController::class, 'create'])->name('cinema.create');
    Route::post('/cinema/create', [CinemaController::class, 'store'])->name('cinema.store');
    Route::get('/cinema/{id}/edit', [CinemaController::class, 'edit'])->name('cinema.edit');
    Route::put('/cinema/{id}/edit', [CinemaController::class, 'update'])->name('cinema.update');
    Route::delete('/cinema/{id}/delete', [CinemaController::class, 'destroy'])->name('cinema.destroy');

    // CRUD City
    Route::get('/city', [CityController::class, 'index'])->name('city.index');
    Route::get('/city/create', [CityController::class, 'create'])->name('city.create');
    Route::post('/city/create', [CityController::class, 'store'])->name('city.store');
    Route::get('/city/{id}/edit', [CityController::class, 'edit'])->name('city.edit');
    Route::put('/city/{id}/edit', [CityController::class, 'update'])->name('city.update');
    Route::delete('/city/{id}/delete', [CityController::class, 'destroy'])->name('city.destroy');
});

