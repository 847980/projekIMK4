<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Studio extends Model
{
    use HasFactory, HasUuids;
    protected $fillable = [
        'name', 'cinema_id'
    ];


    // orm
    public function Cinema()
    {
        return $this->belongsTo(Cinema::class);
    }

    public function ShowTime()
    {
        return $this->hasMany(ShowTime::class);
    }

    
    
}
