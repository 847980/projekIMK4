<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory,HasUuids;

    protected $fillable = [
        'judul', 'release_date', 'duration', 'description', 'sutradara', 'trailer', 'genre_id', 'country_id', 
    ];
}
