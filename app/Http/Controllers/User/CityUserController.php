<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\City;

class CityUserController extends Controller
{
    public function getCity()
    {
        $data['cities'] = City::all();
        return response()->json($data);
    }
}
