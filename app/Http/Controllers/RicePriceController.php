<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\RiceDate;
use App\Models\RicePrice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RicePriceController extends Controller
{
    public function ricepricedata()
    {
        $riceprices = RicePrice::all();
        return view('manage.manage-price', compact('riceprices'));
    }


    //Insert
    function insertRiceprice(Request $request)
    {
        $request->validate([
            'customer_id' => 'required',
            'riceprice_date' => 'required',
            'rice_date' => 'required',
            'riceprice_rice' => 'required',
            'riceprice_quantity' => 'required',
            'riceprice_weight' => 'required',
            'riceprice_price' => 'required'
        ]);

        RicePrice::create($request->post());
        return redirect('manage-price/manage-price');
    }
    //customer Pull data
    public function customerdata()
    {
        $customers = Customer::all();
        return view('manage.manage-price-add', compact('customers'));
    }



    //Edit
    public function editRiceprice($id)
    {
        $editRiceprice = RicePrice::with('customer')->find($id);
        return view('manage.manage-price-edit', compact('editRiceprice'));
    }

    //Update
    function updateRiceprice(Request $request, $id)
    {
        $request->validate([
            'riceprice_date' => 'required',
            'riceprice_rice' => 'required',
            'riceprice_quantity' => 'required',
            'riceprice_weight' => 'required',
            'riceprice_price' => 'required',
        ]);
        $data = [
            'riceprice_date' => $request->riceprice_date,
            'riceprice_rice' =>$request->input('riceprice_rice') == 'other' ? $request->input('other_riceprice_rice') : $request->input('riceprice_rice'),
            'riceprice_quantity' => $request->riceprice_quantity,
            'riceprice_weight' => $request->riceprice_weight,
            'riceprice_price' => $request->riceprice_price,
        ];
        // dd($data);
        RicePrice::find($id)->update($data);
        return redirect('manage-price/manage-price');
    }
    //delete data
    function deleteRiceprice($id)
    {
        $dataRiceprice = RicePrice::find($id);
        $dataRiceprice->delete();
        return redirect('manage-price/manage-price');
    }


    //pull riceprice from customer id
    public function getRicePrice($customer_id)
    {
        $ricePrice = DB::table('rice_prices')->where('customer_id', $customer_id)->value('riceprice_price');
        return response()->json(['riceprice_price' => $ricePrice]);
    }
}
