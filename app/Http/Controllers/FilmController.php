<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Film;
use App\Models\Genre;
use App\Models\Country;


class FilmController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title'] = 'Film';
        $data['films'] = Film::with(['genre','country'])->get();
        return view('admin.film.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['title'] = 'Tambah Film';
        $data['genres'] = Genre::all();
        $data['countries'] = Country::all();
        return view('admin.film.tambahFilm', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'judul' => 'required|min:3|max:50',
            'release_date' => 'required|date',
            'duration' => 'required|integer',
            'description' => 'required|min:10|max:1000',
            'sutradara' => 'required|min:3|max:50',
            'cast' => 'required|min:3|max:100',
            'age_cat' => 'required|min:3|max:50',
            'trailer' => 'required|url',
            'genre_id' => 'required',
            'country_id' => 'required',
        ]);
        
        Film::create($data);
        return redirect()->back()->with('success', 'Film berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //nampilin 1 film
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['title'] = 'Edit Film';
        $data['film'] = Film::findOrFail($id);
        $data['genres'] = Genre::all();
        $data['countries'] = Country::all();

        return view('admin.film.editFilm', $data);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'judul' => 'required|min:3|max:50',
            'release_date' => 'required|date',
            'duration' => 'required|integer',
            'description' => 'required|min:10|max:1000',
            'sutradara' => 'required|min:3|max:50',
            'cast' => 'required|min:3|max:100',
            'age_cat' => 'required|min:3|max:50',
            'trailer' => 'required|url',
            'genre_id' => 'required',
            'country_id' => 'required',
        ]);
        
        Film::findOrFail($id)->update($data);
        return redirect()->back()->with('success', 'Film berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Film::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Film berhasil dihapus');
    }
    
}
