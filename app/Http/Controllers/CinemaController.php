<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cinema;
use App\Models\City;
use App\Models\Country;

class CinemaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title'] = 'Cinema';
        $data['cinemas'] = Cinema::with(['city' => ['country']])->get();
        return view('admin.cinema.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['title'] = 'Tambah Cinema';
        $data['cities'] = City::all();
        $data['countries'] = Country::all();
        //cek
        return view('admin.cinema.tambahCinema', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'address' => 'required',
            'city_id' => 'required'
        ]);

        
        Cinema::create($data);
        return redirect()->back()->with('success', 'Cinema berhasil ditambahkan');
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
      
        $data['title'] = 'Edit Cinema';
        $data['cinema'] = Cinema::findOrFail($id);
        $data['cinemas'] = Cinema::with(['city' => ['country']])->get();
        $data['cities'] = City::all();
        $data['countries'] = Country::all();
        return view('admin.cinema.editCinema', $data);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'name' => 'required',
            'address' => 'required',
            'city_id' => 'required'
        ]);
        
        Cinema::findOrFail($id)->update($data);
        return redirect()->back()->with('success', 'Cinema berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Cinema::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Cinema berhasil dihapus');
    }

    // get cinema by city
    // public function getCinemaByCity(Request $request)
    // {
    //     // validate
    //     $request->validate([
    //         'city_id' => 'required'
    //     ]);
    //     $cinemas = Cinema::where('city_id', $request->city_id)->get();
    //     return response()->json($cinemas);
    // }

}
