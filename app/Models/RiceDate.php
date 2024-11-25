<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiceDate extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'rice_price_id',
        'rice_date_id',
    ];


    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }
    public function ricepriccdate()
    {
        return $this->belongsTo(RicePrice::class, 'rice_date_id');
    }

    public function riceprice()
    {
        return $this->belongsTo(RicePrice::class, 'rice_price_id');  //riceprice_id  ตอนแรก
    }
}
