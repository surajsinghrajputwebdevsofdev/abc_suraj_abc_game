<?php

namespace App\Http\Controllers;

use App\Models\choosed_number;
use App\Models\enternumbertable;
use App\Models\roundtable;
use Illuminate\Http\Request;

class choosed_numberController extends Controller
{
    public function createenternumber(Request $request)
    {
        $user = auth()->user();
        $totalnumbers = $request->input('totalnumbers');
        $ternone = $request->input('ternone');
        $terntwo = $request->input('terntwo');
        $ternthree = $request->input('ternthree');
        $ternfour = $request->input('ternfour');
        $ternfive = $request->input('ternfive');
        $ternsix = $request->input('ternsix');

        $enternumber = enternumbertable::create([
            'user_id' => $user->id,
            'ternone' => $ternone,
            'terntwo' => $terntwo,
            'ternthree' => $ternthree,
            'ternfour' => $ternfour,
            'ternfive' => $ternfive,
            'ternsix' => $ternsix,
            'totalnumbers' => $totalnumbers,
       
        ]);

        return redirect('/home');
    }

}


// return redirect('/home')->with(compact('roundselected','enternumber'));
