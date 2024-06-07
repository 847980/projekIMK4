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
use App\Models\Genre;
use App\Models\Transaction;
use App\Models\User;
use Carbon\Carbon;

class FilmUserController extends Controller
{

    // menampilkan transaksi user yang sudah dilakukan
    public function getUserTicket(){
            $userId = session('id');
            // get showseat
            // mengambil apa yang usdah dibooking oleh user 
            $data['transactions'] = Transaction::with(['DetailTransaction.showseat.showtime.film','DetailTransaction.showseat.showtime.cinema','DetailTransaction.showseat.showtime.studio'])
            ->where('user_id', $userId)
            ->get();

            $today = Carbon::now()->format('Y-m-d');
            $groupedOngoing = [];
            $groupedPast = [];

            // mengambil data film yang sudah dibooking oleh user
            foreach ($data['transactions'] as $transaction) {
                foreach($transaction['DetailTransaction'] as $detail){
                    $showtimeId = $detail->showseat->showtime->id;
                    //ongoing
                    if($detail->showseat->showtime->show_date >= $today){
                        if(!isset($groupedOngoing[$showtimeId])){
                            $groupedOngoing[$showtimeId] = [
                                'title' => $detail->showseat->showtime->film->judul,
                                'cinema' => $detail->showseat->showtime->cinema->name,
                                'studio' => str_replace("studio","",$detail->showseat->showtime->studio->name),
                                'date' => $detail->showseat->showtime->show_date,
                                'time' => $detail->showseat->showtime->start_time,
                                'seat' => [],
                            ];
                        }
                        $groupedOngoing[$showtimeId]['seat'][] = $detail->showseat->chair_number;
                    }
                    // past
                    else{
                        if(!isset($groupedPast[$showtimeId])){
                            $groupedPast[$showtimeId] = [
                                'title' => $detail->showseat->showtime->film->judul,
                                'cinema' => $detail->showseat->showtime->cinema->name,
                                'studio' => $detail->showseat->showtime->studio->name,
                                'date' => $detail->showseat->showtime->show_date,
                                'time' => $detail->showseat->showtime->start_time,
                                'seat' => [],
                            ];
                        }
                        $groupedPast[$showtimeId]['seat'][] = $detail->showseat->chair_number;
                    }
                }
            }
            $data2['ongoing'] = $groupedOngoing;
            $data2['past'] = $groupedPast;
            // implode seat
            foreach($data2['ongoing'] as &$ongoing){
                $ongoing['seat'] = implode(', ', $ongoing['seat']);
            }
            foreach($data2['past'] as &$past){
                $past['seat'] = implode(', ', $past['seat']);
            }
        return response()->json($data2);
    }

    public function detail(Request $request){
        $request->validate([
            'film_id' => 'required',
            'cinema_id' => 'required',
        ]);
        // set session
        $request->session()->put('film_id', $request->film_id);
        $request->session()->put('cinema_id', $request->cinema_id);
        $data['title'] = "detail";
        $data['film'] = Film::where('id', $request->film_id)->first();
        return view('detail', $data);
    }

    public function getUsername($id)
    {
        $data['user'] = User::where('id', $id)->get();
        return response()->json($data);
    }
    
    public function getFilm($cinema)
    {
        $data['films'] = ShowTime::where('cinema_id', $cinema)->distinct()->get();
        foreach ($data['films'] as $film) {
            $result['films'][] = Film::where('id', $film['film_id'])->get();
        }
        return response()->json($result);
    }
    public function getFilmAgeGenre($cinema)
    {
        // dapetin hari ini 
        $data['films'] = ShowTime::where('cinema_id', $cinema)
        ->whereDate('show_date', '>=', Carbon::now())
        ->whereDate('show_date', '<=', Carbon::now()->addDays(13))
        ->pluck('film_id')->unique();

        foreach ($data['films'] as $film) {
            $result['films'][] = Film::select('films.*', 'genres.name as name')->where('films.id', $film)->join('genres', 'films.genre_id', '=', 'genres.id')->get();
        }

        if(empty($result['films'])){
        return response()->json(['success' => false, 'message' => 'Film not found',"until"=>Carbon::now()->addDays(13)->format("Y-m-d")]);
        }
        $result['success'] = true;
        return response()->json($result);
    }
    
    // book
    public function getDetail(Request $request)
    {   
        $request->validate([
            'film_id' => 'required',
            'cinema_id' => 'required',
        ]);
        // set session
        $request->session()->put('film_id', $request->film_id);
        $request->session()->put('cinema_id', $request->cinema_id);
        $data['title'] = "book";
        $data['date'] = Carbon::now();
        $data['end_date'] = Carbon::now()->addDays(13);
        $data['film'] = Film::where('id', $request->film_id)->first();

        return view('book', $data);
    }
    public function getDate($cinemaId, $filmId){
        $data['dates'] = ShowTime::where('film_id', $filmId)->where('cinema_id', $cinemaId)->distinct()->pluck('show_date')->toArray();
        return response()->json($data);
    }
    public function getStudioTime($id, $date) {
        $data['studioTimes'] = ShowTime::with(['studio', 'cinema'])
            ->where('film_id', $id)
            ->where('show_date', $date)
            ->where('cinema_id',session('cinema_id'))
            ->where(
                function($query){
                    $query
                        ->where('show_date', ">", now()->toDateString())
                        ->orWhere(
                            function($query) {
                                $query
                                    ->where('show_date', "=", now()->toDateString())
                                    ->where('start_time', ">", now()->toTimeString());
                            }
                        );
                }
            )
            ->get();
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
    public function getGenreName($id)
    {
        $data = Genre::where('id', $id)->get();
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
            'transaction_id'=>'required', 'showseat_id'=>'required'
        ]);
    
        if ($validator->fails()) {
            return response()->json(['success' => false, 'message' => 'Validation failed', 'errors' => $validator->errors()], 422);
        }

        try {
            $transaction = DetailTransaction::create($request);
            return response()->json(['success' => true, 'message' => 'Transaction created successfully', 'detailTransaction_id'=>$transaction->id]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error creating detail transaction']);

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

    public function seatCheck($id){
        $data = ShowSeat::where('id', $id)->get();
        return response()->json($data);
    }
}