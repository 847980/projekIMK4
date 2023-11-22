<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cinema extends Model
{
    use HasFactory,HasUuids;
    protected $fillable = [
        'name', 'address', 'city_id'
    ];

    // orm
    public function City()
    {
        return $this->belongsTo(City::class);
    }
}
