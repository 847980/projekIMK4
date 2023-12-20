<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class ShowSeat extends Model
{
    use HasFactory,HasUuids;

    protected $guarded = ['id'];

    // orm
    public function ShowTime()
    {
        return $this->belongsTo(ShowTime::class);
    }

    public function DetailTransaction()
    {
        return $this->hasOne(DetailTransaction::class);
    }
    
}
