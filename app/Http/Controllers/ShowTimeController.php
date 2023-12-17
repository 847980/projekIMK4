<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Film;
use App\Models\Cinema;
use App\Models\Studio;
use App\Models\ShowSeat;


use App\Models\ShowTime;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class ShowTimeController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title'] = 'ShowTime';
        $data['showtimes'] = ShowTime::with(['film','studio'])->get();
        return view('admin.showtime.show', $data);
        
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
        
        return view('admin.showtime.show-add', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'film_id' => 'required',
            'cinema_id' => 'required', 
            'studio_id' => 'required',
            'show_date' => 'required|date',
            'show_time' => 'required',
            'price' => 'required|integer',
        ]);

        //covert show time ke start time dan end time
        $show_time = explode('-', $request->show_time);
        $data['start_time'] = $show_time[0];
        $data['end_time'] = $show_time[1];
        unset($data['show_time']);

        // unique rule
        $uniqueRule = Rule::unique('show_times', 'show_date')
            ->where('studio_id', $request->studio_id)
            ->where('start_time', $data['start_time'])
            ->where('end_time', $data['end_time']);

        // check unique rule
        $request->validate([
            'show_date' => $uniqueRule
        ]);
        
        ShowTime::create($data);

        // generate seat
        // get last id
        $last_id = ShowTime::latest()->first()->id;
        $data = [
            'showtime_id' => $last_id,
            'chair_number' => 1,
            'chair_status' => 0,
        ];

        $studio = Studio::findOrFail($request->studio_id);
    
        for($i=1;$i<=$studio->total_chair;$i++){
            ShowSeat::create($data);
            $data['chair_number']++;
        }
            
        
        
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
        $data['title'] = 'Edit Film';
        $data['showtime'] = ShowTime::findOrFail($id);
        $data['films'] = Film::all();
        $data['cities'] = City::all();
        
    //    search city where this cinema
        $city_id = Cinema::where('id', $data['showtime']->cinema_id)->first()->city_id;
        $data['cinemas'] = Cinema::where('city_id', $city_id)->get();
        $data['studios'] = Studio::where('cinema_id', $data['showtime']->cinema_id)->get();

        return view('admin.showtime.show-edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'film_id' => 'required',
            'cinema_id' => 'required', 
            'studio_id' => 'required',
            'show_date' => 'required|date',
            'show_time' => 'required',
            'price' => 'required|integer',
        ]);

        //covert show time ke start time dan end time
        $show_time = explode('-', $request->show_time);
        $data['start_time'] = $show_time[0];
        $data['end_time'] = $show_time[1];
        unset($data['show_time']);

        // unique rule
        $uniqueRule = Rule::unique('show_times', 'show_date')
            ->where('studio_id', $request->studio_id)
            ->where('start_time', $data['start_time'])
            ->where('end_time', $data['end_time'])
            ->ignore($id);

        // check unique rule
        $request->validate([
            'show_date' => $uniqueRule
        ]);
        
        ShowTime::findOrFail($id)->update($data);
        return redirect()->back()->with('success', 'ShowTime berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            ShowTime::findOrFail($id)->delete();
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Showtime gagal dihapus karena sudah ada pembeli tiket');
        }
        return redirect()->back()->with('success', 'Showtime berhasil dihapus');
    }
}
