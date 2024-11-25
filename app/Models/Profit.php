<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profit extends Model
{
    use HasFactory;


    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function riceprice()
    {
        return $this->belongsTo(RicePrice::class, 'riceprice_id');  //riceprice_id  ตอนสอง
    }
}
