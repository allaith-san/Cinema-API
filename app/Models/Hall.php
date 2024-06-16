<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hall extends Model
{
    use HasFactory;

    public function theater(){
        return $this->belongsTo(Theater::class);
    }
    
    public function screenings(){
        return $this->hasMany(Screening::class);
    }
}
