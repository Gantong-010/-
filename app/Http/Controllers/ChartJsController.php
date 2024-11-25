<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\RicePrice;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ChartJsController extends Controller
{
    public function chartjshome()
    {
        $months = ["มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม"];

        $ricePrices = RicePrice::selectRaw('SUM(riceprice_price) as total_price, DATE_FORMAT(riceprice_date, "%m") as month')
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        $incomes = [];

        foreach ($months as $monthName) {
            // แปลงชื่อเดือนเป็นรูปแบบตัวเลข ("มกราคม" เป็น "01", "กุมภาพันธ์" เป็น "02", เป็นต้น)
            $monthNumeric = array_search($monthName, $months) + 1; // กำหนดให้ $months เริ่มจาก 1
            $income = $ricePrices->where('month', sprintf("%02d", $monthNumeric))->first();
            $incomes[] = $income ? $income->total_price : 0;
        }
        // dd($ricePrices->toArray(), $income, $incomes, $months);

        //Customer ทั้งหมด
        $customerD = Customer::all();
        $data = $customerD->count(); // ใช้เมธอด count() เพื่อรับจำนวนลูกค้า

        //Riceprice_weight น้ำหนักข้าวทั้งหมด
        $ricepriceD = RicePrice::all();
        $ricepriceWeightCount = 0;

        foreach ($ricepriceD as $riceprice) {
            $ricepriceWeightCount += $riceprice->riceprice_weight;
        }

        //Riceprice_price ดึงราคาทั้งหมดมาบวกกัน
        $ricepriceP = Riceprice::all();
        $ricepricePriceCount = 0 ;
        foreach ($ricepriceP as $riceprice) {
            $ricepricePriceCount += $riceprice->riceprice_price;
        }

        return view('home.home', compact('months', 'incomes', 'data','ricepriceWeightCount','ricepricePriceCount'));
    }

}
