<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;


class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title'] = 'Genre';
        $data['genres'] = Genre::all();
        return view('admin.genre.genre', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $data['title'] = 'Tambah Genre';
        // $data['genres'] = Genre::all();
        // return view('admin.genre.tambahGenre', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
        ]);
        
        Genre::create($data);
        return redirect()->back()->with('success', 'Genre berhasil ditambahkan');
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
        // $data['title'] = 'Edit Film';
        // $data['genre'] = Genre::findOrFail($id);

        // return view('admin.genre.index', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'name' => 'required',
        ]);
        
        Genre::findOrFail($id)->update($data);
        return redirect()->back()->with('success', 'Genre berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            Genre::findOrFail($id)->delete();
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Genre tidak boleh dihapus');
        }
        return redirect()->back()->with('success', 'Genre berhasil dihapus');
    }
}
