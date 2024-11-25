<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\RiceDate;
use App\Models\RicePrice;
use Illuminate\Http\Request;

class RiceDateViewController extends Controller
{
        public function ricedatedetail($id){

            $ricedate = RicePrice::where('id', '=', $id)->first(); 
            return view('savetheday.savetheday-bill', compact('ricedate'));
        }
    
        // // ดึงข้อมูล RiceDate ด้วย $id
        // $ricedate = RiceDate::find($id);

        // if (!$ricedate) {
        //     // หากไม่มีข้อมูลใน RiceDate ให้ตั้งค่าข้อความแจ้งเตือนใน session และ redirect กลับไปยังหน้าเดิม
        //     $error = 'ข้อมูล RiceDate ไม่ถูกต้อง';
        //     return view('savetheday.savetheday', compact('error'));
        // }

        // // ดึงข้อมูลอื่นๆ
        // $ricedateDate = $ricedate->ricedate_date;
        // $customerId = $ricedate->customer_id;
        // $ricedateId = $ricedate->rice_price_id;

        // if (!$customerId || !$ricedateId) {
        //     // หากข้อมูลไม่ครบ ให้ตั้งค่าข้อความแจ้งเตือนใน session และ redirect กลับไปยังหน้าเดิม
        //     $error = 'ข้อมูล RiceDate ไม่ถูกต้อง';
        //     return view('savetheday.savetheday', compact('error'));
        // }

        // // ดึงข้อมูล customer_name จากตาราง Customer ด้วย Eloquent
        // $ricedateCustomer = Customer::find($customerId)->customer_name ?? null;
        // $ricedateRiceprice = RicePrice::find($ricedateId)->riceprice_rice ?? null;

        // if (!$ricedateCustomer || !$ricedateRiceprice) {
        //     // หากข้อมูลไม่ครบ ให้ตั้งค่าข้อความแจ้งเตือนใน session และ redirect กลับไปยังหน้าเดิม
        //     $error = 'ข้อมูล RiceDate ไม่ถูกต้อง';
        //     return view('savetheday.savetheday', compact('error'));
        // }

        // // ส่งข้อมูลไปยัง view
        // return view('savetheday.savetheday-bill', compact('ricedateDate','ricedateCustomer','ricedateRiceprice'));
        // }
    
}
