<?php

namespace App\Http\Controllers\Api;

use App\Doctor;
use App\Http\Controllers\Controller;
use App\Specialization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $doctors = Doctor::with(['specializations'])->whereHas('plans', function ($active) {
        //     $active->where('ending_date', '>', date('Y-m-d H:i:s'));
        // })->limit(4)->inRandomOrder()->get();
        // foreach ($doctors as $doctor) {
        //     $doctor->vote = $doctor->reviews->avg('vote');
        //     unset($doctor->email_verified_at, $doctor->created_at, $doctor->updated_at);
        //     foreach ($doctor->specializations as $specialization) {
        //         unset($specialization->created_at, $specialization->updated_at, $specialization->pivot);
        //     }
        //     $doctor->photo = $this->fixImageUrl($doctor->photo);
        // }
        // return response()->json([
        //     'success'   => true,
        //     'result'    => $doctors
        // ]);

        $result = Doctor::with('specializations', 'stars', 'reviews', 'plans')->get();
        $success = true;

        return response()->json(compact('result', 'success'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function specialization()
    {
        $result = Specialization::all();
        $success = true;

        return response()->json(compact('result', 'success'));
    }
}
