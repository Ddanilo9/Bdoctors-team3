<?php

namespace App\Http\Controllers;

use App\Doctor;
use App\Http\Controllers\Controller;
use App\Star;
use Illuminate\Http\Request;

class StarController extends Controller
{

    public function storeVote(Request $request, $id)

    {
        $data= $request->all();    
        
        $doctor = Doctor::where('id', $id)->first();

        $doctor->stars()->attach($data['number']);
        

        return redirect()->route('guest.doctors.show', $doctor->slug);
    }
}
