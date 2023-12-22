<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShowTime extends Model
{
    use HasFactory,HasUuids;

    protected $guarded = ['id'];

    // orm
    // public function DetailTransaction()
    // {
    //     return $this->hasMany(DetailTransaction::class);
    // }

    public function Film(){
        return $this->belongsTo(Film::class);
    }

    public function Studio(){
        return $this->belongsTo(Studio::class);
    }

    public function Cinema(){
        return $this->belongsTo(Cinema::class);
    }

    public function ShowSeat(){
        return $this->hasMany(ShowSeat::class, "showtime_id");
    }

    
}
