<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\RiceDate;
use App\Models\RicePrice;
use App\Models\SaveMoney;
use Illuminate\Http\Request;

class SaveMoneyViewController extends Controller
{
    public function savemoneydetail($id){

        $savemoney = SaveMoney::where('id', '=', $id)->first(); 
        return view('savemoney.savemoney-bill', compact('savemoney'));
    }
}
