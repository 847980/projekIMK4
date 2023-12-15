<?php

namespace App\Http\Controllers;

use App\Models\ShowTime;
use App\Models\Film;
use App\Models\Studio;
use App\Models\Cinema;
use App\Models\City;

use Illuminate\Http\Request;


class ShowTimeController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title'] = 'ShowTime';
        $data['showtimes'] = ShowTime::with(['film','studio'])->get();
        return view('admin.showtime.index', $data);
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['title'] = 'Tambah Film';
        $data['films'] = Film::all();
        $data['cinemas'] = Cinema::all();
        $data['studios'] = Studio::all();
        // city
        $data['cities'] = City::all();
        
        return view('admin.showtime.tambahShow', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'film_id' => 'required',
            'studio_id' => 'required',
            'show_date' => 'required|date',
            'show_time' => 'required',
            'price' => 'required|integer',
        ]);

        // cari cinema
        $studio = Studio::find($request->studio_id);
        $cinema = Cinema::find($studio->cinema_id);

        ShowTime::create($data);
        return redirect()->route('admin.showtime.create')->with('success', 'ShowTime berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
