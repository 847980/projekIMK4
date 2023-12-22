<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Film;
use App\Models\Genre;
use App\Models\Country;
use Illuminate\Support\Facades\Storage;

class FilmController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title'] = 'Film';
        $data['films'] = Film::with(['genre','country'])->get();
        return view('admin.film.film', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['title'] = 'Tambah Film';
        $data['genres'] = Genre::all();
        $data['countries'] = Country::all();
        return view('admin.film.film-add', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'judul' => 'required|unique:films,judul|min:3|max:50',
            'release_date' => 'required|date',
            'duration' => 'required|integer',
            'description' => 'required|min:10|max:1000',
            'sutradara' => 'required|min:3|max:50',
            'cast' => 'required|min:3|max:100',
            'age_cat' => 'required|min:3|max:50',
            'trailer' => 'required|url|max:255',
            'genre_id' => 'required',
            'country_id' => 'required',
            'poster_potrait' => 'required|image|mimes:jpg,jpeg,png',
            'poster_landscape' => 'required|image|mimes:jpg,jpeg,png',
        ]);

         
        $filename_potrait = $request->judul . '_potrait'. '-' . time() . '.' . $request->poster_potrait->extension();
        $request->poster_potrait->storeAs('public/assets', $filename_potrait);
        // Storage::putFileAs('public', $request->file('poster_potrait'), $filename_potrait);

        $filename_landscape = $request->judul . '_landscape'. '-' . time() . '.' . $request->poster_landscape->extension();
        $request->poster_landscape->storeAs('public/assets', $filename_landscape);
        
        $data['poster_potrait'] = $filename_potrait;
        $data['poster_landscape'] = $filename_landscape;

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

        return view('admin.film.film-edit', $data);

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
            'poster_potrait' => 'nullable|image|mimes:jpg,jpeg,png',
            'poster_landscape' => 'nullable|image|mimes:jpg,jpeg,png',
        ]);

        $film = Film::findOrFail($id);
        $data['poster_potrait'] = $film->poster_potrait;
        $data['poster_landscape'] = $film->poster_landscape;

        if($request->poster_potrait){
            // hapus file lama
            Storage::delete('public/assets/' . $data['poster_potrait'] );

            $filename_potrait = $request->judul . '_potrait'. '-' . time() . '.' . $request->poster_potrait->extension();
            $request->poster_potrait->storeAs('public/assets', $filename_potrait);
            $data['poster_potrait'] = $filename_potrait;
        }

        if($request->poster_landscape){
            // hapus file lama
            Storage::delete('public/assets/' . $data['poster_landscape'] );

            $filename_landscape = $request->judul . '_landscape'. '-' . time() . '.' . $request->poster_landscape->extension();
            $request->poster_landscape->storeAs('public/assets', $filename_landscape);
            $data['poster_landscape'] = $filename_landscape;
        }
        
        $film->update($data);
        return redirect()->back()->with('success', 'Film berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $film = Film::findOrFail($id);
        try{
            $film->delete();
        }catch(\Exception $e){
            return redirect()->back()->with('error', 'Film gagal dihapus karena terhubung ke tabel lain');
        }

        // hapus file lama
        Storage::delete('public/assets/' . $film->poster_potrait );
        Storage::delete('public/assets/' . $film->poster_landscape );
        return redirect()->back()->with('success', 'Film berhasil dihapus');
    }
    
}
