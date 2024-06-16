<?php

namespace App\Models;

use Illuminate\Contracts\Database\Query\Builder as QueryBuilder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;



class Customer extends Authenticatable
{
    use HasFactory, Notifiable;


    public function tickets(){
        return $this->hasMany(Ticket::class);
    }

    public function checkPassword(){
        return "HI";
    }

    protected $fillable = [
        'name',
        'email',
        'password',
        'address',
        'city',
        'zipcode',
    ];
    
    
    protected $hidden = [
        'password',
        'remember_token',
    ];


    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function scopeFromId(Builder $builder, $id)
    {
        $builder->where('id', '>=', $id);
    }
}
