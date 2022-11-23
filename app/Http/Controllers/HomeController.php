<?php

namespace App\Http\Controllers;

use App\Doctor;
use App\Review;
use App\Specialization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctors = Doctor::orderBy('created_at', 'desc')->limit(5)->get();
        
        $specializations = Specialization::orderBy('created_at', 'desc')->limit(5)->get();
        return view('guest.home', compact('doctors', 'specializations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store( Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {

        $doctor = Doctor::where('slug', $slug)->first();
        $reviews = Review::where('doctor_id', $doctor->id )->orderBy('created_at', 'desc')->get();
        //  dd($doctor);
        $avg =DB::table('stars')
            ->select(DB::raw('round(avg(doctor_star.star_id), 1) as avg'))
            ->join('doctor_star', 'doctor_star.star_id', '=', 'stars.id')
            ->where('doctor_star.doctor_id', $doctor->id)
            ->get();

        $doctor->avg = $avg[0]->avg;


        return view('guest.doctors.show', compact('doctor', 'reviews'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
}
