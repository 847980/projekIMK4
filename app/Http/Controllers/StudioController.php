<?php

namespace App\Http\Controllers;

use App\Models\Studio;
use Illuminate\Http\Request;

class StudioController extends Controller
{
    //
    //get studio by cinema
    public function getStudioByCinema($id)
    {
        $data = Studio::where('cinema_id', $id)->get();
        return response()->json($data);
    }
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title'] = 'Studio';
        $data['studios'] = Studio::with([
            'cinema' => ['city' => ['country']]
        ])->get();
        return view('admin.studio.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $data['title'] = 'Tambah Film';
        // $data['cities'] = City::all();
        // $data['countries'] = Country::all();
        // return view('admin.film.tambahFilm', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $data = $request->validate([
        //     'judul' => 'required|min:3|max:50',
        //     'release_date' => 'required|date',
        //     'duration' => 'required|integer',
        //     'description' => 'required|min:10|max:1000',
        //     'sutradara' => 'required|min:3|max:50',
        //     'cast' => 'required|min:3|max:100',
        //     'age_cat' => 'required|min:3|max:50',
        //     'trailer' => 'required|url',
        //     'genre_id' => 'required',
        //     'country_id' => 'required',
        // ]);
        
        // Film::create($data);
        // return redirect()->back()->with('success', 'Film berhasil ditambahkan');
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
        // $data['title'] = 'Edit Film';
        // $data['film'] = Film::findOrFail($id);
        // $data['genres'] = Genre::all();
        // $data['countries'] = Country::all();

        // return view('admin.studio.editFilm', $data);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'name' => 'required',
        ]);
        
        Studio::findOrFail($id)->update($data);
        return redirect()->back()->with('success', 'Studio berhasil diuabh');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Studio::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Studio berhasil dihapus');
    }
    
}
