<?php

namespace App\Http\Controllers\User;

use App\Models\Film;
use App\Models\Cinema;
use App\Models\Studio;
use App\Models\ShowSeat;
use App\Models\ShowTime;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DetailTransaction;
use App\Models\Transaction;

class FilmUserController extends Controller
{
    public function getFilm($cinema)
    {
        $data['films'] = ShowTime::where('cinema_id', $cinema)->distinct()->get();
        foreach ($data['films'] as $film) {
            $result['films'][] = Film::where('id', $film['film_id'])->get();
        }
        return response()->json($result);
    }
    public function getDetail()
    {
        $data['title'] = "detail";
        return view('detailFilm', $data);
    }
    public function getDate($cinemaId, $filmId){
        $data['dates'] = ShowTime::where('film_id', $filmId)->where('cinema_id', $cinemaId)->distinct()->pluck('show_date')->toArray();
        return response()->json($data);
    }
    public function getStudioTime($id, $date){
        $data['studioTimes'] = ShowTime::with('studio')->where('film_id', $id)->where('show_date', $date)->get();
        return response()->json($data);
    }
    public function getChair($id){
        $data['chairs'] = ShowSeat::where('showtime_id', $id)->get();
        return response()->json($data);
    }
    public function transaction(){
        $data['title'] = "transaction";
        return view('transaction', $data);
    }
    public function getFilmName($film)
    {
        $data = Film::where('id', $film)->get();
        return response()->json($data);
    }
    public function getStudioName($studio)
    {
        $data = Studio::where('id', $studio)->get();
        return response()->json($data);
    }
    public function getCinemaName($cinema)
    {
        $data = Cinema::where('id', $cinema)->get();
        return response()->json($data);
    }
    public function getPrice($id)
    {
        $data = ShowTime::where('id', $id)->get();
        return response()->json($data);
    }
    public function getSeatNumber($id)
    {
        $data = ShowSeat::where('id', $id)->get();
        return response()->json($data);
    }
    public function createTransaction($id, $total)
    {
        $request = ['user_id'=>$id, 'total'=>$total];
        $validator = validator($request, [
            'user_id' => 'required',
            'total' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json(['success' => false, 'message' => 'Validation failed', 'errors' => $validator->errors()], 422);
        }

        try {
            $transaction = Transaction::create($request);
            return response()->json(['success' => true, 'message' => 'Transaction created successfully', 'transaction_id'=>$transaction->id]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error creating transaction']);
        }
    }
    public function createDetailTransaction($trans_id, $show_id)
    {
        $request = ['transaction_id'=>$trans_id, 'showseat_id'=>$show_id];
        $validator = validator($request, [
            'transaction_id' => 'required',
            'showseat_id' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json(['success' => false, 'message' => 'Validation failed', 'errors' => $validator->errors()], 422);
        }

        try {
            $transaction = DetailTransaction::create($request);
            return response()->json(['success' => true, 'message' => 'Transaction created successfully', 'detailTransaction_id'=>$transaction->id]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error creating transaction']);
        }
    }
    public function seatUpdate($id)
    {
        $request = ['chair_status'=>1];
        $validator = validator($request, [
            'chair_status' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json(['success' => false, 'message' => 'Validation failed', 'errors' => $validator->errors()], 422);
        }

        $seat = ShowSeat::findOrFail($id);
        
        
        $seat->update($request);
        return response()->json(['success' => true, 'message' => 'update successfully']);
    }
}