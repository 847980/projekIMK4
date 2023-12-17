<?php

use App\Models\Film;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CityController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\CinemaController;
use App\Http\Controllers\PaypalController;
use App\Http\Controllers\StudioController;
use App\Http\Controllers\ShowTimeController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\User\CityUserController;
use App\Http\Controllers\User\FilmUserController;
use App\Http\Controllers\Auth\AdminAuthController;
use App\Http\Controllers\User\CinemaUserController;

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
    
    Route::get('/get-cities', [CityUserController::class, 'getCity']);
    Route::get('/get-cinemas/{id}', [CinemaUserController::class, 'getCinema']);
    Route::get('/get-films/{id}', [FilmUserController::class, 'getFilm']);
    Route::get('/get-films-lengkap/{id}', [FilmUserController::class, 'getFilmAgeGenre']);
    Route::post('/get-detail', [FilmUserController::class, 'getDetail'])->name('get-detail');
    Route::get('/get-date/{cinemaId}/{filmId}', [FilmUserController::class, 'getDate']);
    Route::get('/get-studio-time/{filmId}/{date}', [FilmUserController::class, 'getStudioTime']);
    Route::get('/get-chair/{showtimeId}', [FilmUserController::class, 'getChair']);
    Route::post('/transaction', [FilmUserController::class, 'transaction'])->name('transaction');
    Route::get('/get-film-title/{filmId}', [FilmUserController::class, 'getFilmName']);
    Route::get('/get-studio/{studioId}', [FilmUserController::class, 'getStudioName']);
    Route::get('/get-cinema/{cinemaId}', [FilmUserController::class, 'getCinemaName']);
    Route::get('/get-genre/{id}', [FilmUserController::class, 'getGenreName']);
    Route::get('/get-price/{stId}', [FilmUserController::class, 'getPrice']);
    Route::get('/get-seats-number/{seatId}', [FilmUserController::class, 'getSeatNumber']);
    Route::get('/create-transaction/{Id}/{total}', [FilmUserController::class, 'createTransaction']);
    Route::get('/create-detail/{Id1}/{id2}', [FilmUserController::class, 'createDetailTransaction']);
    Route::get('/update-seat/{id}', [FilmUserController::class, 'seatUpdate']);

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


       // for ajax
    Route::post('/cinema/byCity', [CinemaController::class, 'getCinemaByCity'])->name('getCinema.byCity');
    Route::post('/studio/byCinema', [StudioController::class, 'getStudioByCinema'])->name('getStudio.byCinema');
});

Route::get('/payment', function () {
    return view('payment'); 
});

Route::post('paypal', [PaypalController::class, 'paypal'])->name('paypal');
Route::get('success', [PaypalController::class, 'success'])->name('success');
Route::get('cancel', [PaypalController::class, 'cancel'])->name('cancel');


// punya jev

Route::get('/book', function () {
    return view('book');
});

// punya ali
Route::get('/home', function () {
    return view('home');
});

Route::get('/detail', function () {
    return view('detail');
});
Route::get('/profile', function () {
    return view('profile');
});

Route::get('/checkout', function() {
    return view('checkout');
});

//top coba
Route::get('/get-cities', [CityUserController::class, 'getCity']);
Route::get('/get-cinemas/{id}', [CinemaUserController::class, 'getCinema']);
Route::get('/get-films/{filmId}', [FilmUserController::class, 'getFilm']);
Route::post('/get-detail', [FilmUserController::class, 'getDetail'])->name('get-detail');
Route::get('/get-date/{cinemaId}/{filmId}', [FilmUserController::class, 'getDate']);
Route::get('/get-studio-time/{filmId}/{date}', [FilmUserController::class, 'getStudioTime']);
Route::get('/get-chair/{showtimeId}', [FilmUserController::class, 'getChair']);
Route::post('/transaction', [FilmUserController::class, 'transaction'])->name('transaction');
Route::get('/get-film-title/{filmId}', [FilmUserController::class, 'getFilmName']);
Route::get('/get-studio/{studioId}', [FilmUserController::class, 'getStudioName']);
Route::get('/get-cinema/{cinemaId}', [FilmUserController::class, 'getCinemaName']);
Route::get('/get-price/{stId}', [FilmUserController::class, 'getPrice']);
Route::get('/get-seats-number/{seatId}', [FilmUserController::class, 'getSeatNumber']);
Route::get('/create-transaction/{Id}/{total}', [FilmUserController::class, 'createTransaction']);
Route::get('/create-detail/{Id1}/{id2}', [FilmUserController::class, 'createDetailTransaction']);
    Route::get('/get-films-lengkap/{id}', [FilmUserController::class, 'getFilmAgeGenre']);
    Route::get('/update-seat/{id}', [FilmUserController::class, 'seatUpdate']);