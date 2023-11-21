<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class city extends Model
{
    use HasFactory,HasUuids;

    //perlu kasik table spesifik karena namanya ga sesuai convention yaitu haruse cities
    protected $table = "city";
    protected $fillable=[
        'name', 'country_id'
    ];
}
