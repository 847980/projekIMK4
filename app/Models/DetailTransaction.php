<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTransaction extends Model
{
    use HasFactory, HasUuids;
    protected $guarded = ['id'];

    // orm
    public function Transaction()
    {
        return $this->belongsTo(Transaction::class);
    }

    // public function ShowTime()
    // {
    //     return $this->belongsTo(ShowTime::class);
    // }

    public function ShowSeat()
    {
        return $this->belongsTo(ShowSeat::class);
    }
}
