<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Cinema;

class CinemaUserController extends Controller
{
    public function getCinema($id)
    {
        $data['cinemas'] = Cinema::where('city_id', $id)->get();
        return response()->json($data);
    }
}
