<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RicePrice extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'riceprice_date',
        'rice_date',
        'riceprice_rice',
        'riceprice_quantity',
        'riceprice_weight',
        'riceprice_price'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function savemoney()
    {
        return $this->hasOne(SaveMoney::class, 'riceprice_id');  
    }

    public function profit()
    {
        return $this->hasOne(Profit::class, 'riceprice_id');  
    }

    public function riceprice()
    {
        return $this->belongsTo(RicePrice::class, 'riceprice_id');
    }
   

    
}
