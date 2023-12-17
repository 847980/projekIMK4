<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Country;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title'] = 'City';
        $data['cities'] = City::with(['country'])->get();
        $data['countries'] = Country::all();
        return view('admin.city.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['title'] = 'Tambah City';
        $data['countries'] = Country::all();
        return view('admin.city.tambahFilm', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'country_id' => 'required',
        ]);
        
        City::create($data);
        return redirect()->back()->with('success', 'City berhasil ditambahkan');
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
        $data['title'] = 'Edit City';
        $data['city'] = City::findOrFail($id);
        $data['countries'] = Country::all();

        return view('admin.city.editFilm', $data);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'name' => 'required',
            'country_id' => 'required',
        ]);
        
        City::findOrFail($id)->update($data);
        return redirect()->back()->with('success', 'City berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        City::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'City berhasil dihapus');
    }

}
