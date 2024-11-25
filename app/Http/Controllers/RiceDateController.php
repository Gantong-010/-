<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\RiceDate;
use App\Models\RicePrice;
use Illuminate\Http\Request;

class RiceDateController extends Controller
{
    public function ricedatedata()
    {
        $ricedates = RicePrice::all();
        return view('savetheday.savetheday', compact('ricedates'));
    }

    //Edit
    public function editRicedate($id) 
    {
        $editRicedate = RicePrice::with('customer','riceprice')->find($id);

        return view('savetheday.savetheday-edit', compact('editRicedate'));
    }

    //Update
    function updateRicedate(Request $request, $id)
    {
        $request->validate([
            'rice_date',
            'riceprice_rice',     
        ]);


        RicePrice::find($id)->update($request->post());
        return redirect('savetheday/savetheday');
    }


    //delete data
    function deleteRicedate($id) {
        $dataRicedate = RiceDate::find($id);
        $dataRicedate->delete();
        return redirect('savetheday/savetheday');
    }
}
