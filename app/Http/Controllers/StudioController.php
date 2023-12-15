<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Studio;

class StudioController extends Controller
{
    //
    //get studio by cinema
    public function getStudioByCinema($id)
    {
        $data = Studio::where('cinema_id', $id)->get();
        return response()->json($data);
    }
}
