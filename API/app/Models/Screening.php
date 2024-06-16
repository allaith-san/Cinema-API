<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Screening extends Model
{
    use HasFactory;

    public function movie(){
        return $this->belongsTo(Movie::class);
    }

    public function hall(){
        return $this->belongsTo(Hall::class);
    }

    public function tickets(){
        return $this->hasMany(Ticket::class);
    }
}
