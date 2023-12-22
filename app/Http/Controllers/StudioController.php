<?php

namespace App\Http\Controllers;

use App\Models\cinema;
use App\Models\Studio;
use Illuminate\Http\Request;

class StudioController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title'] = 'Studio';
        $data['studios'] = Studio::with([
            'cinema' => ['city' => ['country']]
        ])->get();
        return view('admin.studio.studio', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['title'] = 'Tambah Studio';
        $data['cinemas'] = cinema::with(['city'])->get();
        return view('admin.studio.studio-add', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'cinema_id' => 'required',
            'name' => 'required',
            'total_chair' => 'required|integer',
        ]);

        // dd($data);
        
        Studio::create($data);
        return redirect()->back()->with('success', 'Studio berhasil ditambahkan');
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
            'total_chair' => 'required|integer',
        ]);

        // dd($data);
        
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

    
    //get studio by cinema
    public function getStudioByCinema(Request $request)
    {
        $data= $request->validate([
            'cinema_id' => 'required'
        ]);
        $data = Studio::where('cinema_id', $data['cinema_id'])->get();
        return response()->json($data);
    }
}
