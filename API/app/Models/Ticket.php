<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;


class Ticket extends Model
{
    use HasFactory;

    public function customer(){
        return $this->belongsTo(Customer::class);
    }

    public function screening(){
        return $this->belongsTo(Screening::class);
    }

    public function scopeFromCost(Builder $builder, $cost)
    {
        $builder->where('cost', '>=', $cost);
    }

    protected $fillable = [
        'customer_id',
        'screening_id',
        'cost',
        'status',
        'billed_date',
        'paid_date'
    ];
}
