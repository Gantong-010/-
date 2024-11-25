<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_name',
        'customer_phone',
        'customer_address',
        'customer_idline',
    ];

    public function riceprices()
    {
        return $this->hasMany(RicePrice::class, 'customer_id');
    }

    public function ricedates()
    {
        return $this->hasMany(RicePrice::class, 'customer_id');
    }

    public function savemoneys()
    {
        return $this->hasMany(SaveMoney::class, 'customer_id');
    }

    public function profits()
    {
        return $this->hasMany(Profit::class, 'customer_id');
    }
}
