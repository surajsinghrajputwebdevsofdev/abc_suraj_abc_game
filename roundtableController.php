<?php

namespace App\Http\Controllers;

use App\Models\roundtable;
 use Illuminate\Http\Request;

class roundtableController extends Controller
{
    public function createround(Request $request)
    {
        $user = auth()->user();
        $validatedData = $request->validate([
            'selectround' => 'required',
            'selectsubround' => 'required',
            'selectbow' => 'required',
            'selectarrow' => 'required',
            'selectlocation' => 'required',
            'selectsessiontype' => 'required',
            'selectinputmethod' => 'required',
           
        ]);

        $round = roundtable::create([
            'user_id' => $user->id,
            'selectround' => $validatedData['selectround'],
            'selectsubround' => $validatedData['selectsubround'],
            'selectbow' => $validatedData['selectbow'],
            'selectarrow' => $validatedData['selectarrow'],
            'selectlocation' => $validatedData['selectlocation'],
            'selectsessiontype' => $validatedData['selectsessiontype'],
            'selectinputmethod' => $validatedData['selectinputmethod'],
        ]);

        return redirect('/enternumbers');
    }

}

