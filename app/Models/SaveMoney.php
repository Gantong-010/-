<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaveMoney extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'rice_date_id',
        'savemoney_bag',
        'savemoney_receive',
        'savemoney_type',
        'savemoney_change',
        'savemoney_status'
        // เพิ่มฟิลด์ที่ต้องการสามารถแก้ไขอัพเดทข้อมูลได้
        // เพิ่มฟิลด์ที่ต้องการสามารถ Mass Assignment ได้ตามต้องการ
    ];


    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function ricedate()
    {
        return $this->belongsTo(RicePrice::class, 'rice_date_id');
    }
}
