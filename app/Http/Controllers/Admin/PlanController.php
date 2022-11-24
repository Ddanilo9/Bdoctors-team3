<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Plan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $sponsors = Plan::all();

        // $doctor = Auth::user()->doctor;

        // return view('admin.plans', compact('sponsors','user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $plans = Plan::all();
        $doctor = Auth::user()->doctor;

        return view('admin.plans.create', compact('plans','doctor'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $doctor = Auth::user()->doctor;

        $startDate = Carbon::now();


        switch ($request['plan']) {
            case 1:
                $expireDate = Carbon::parse($startDate)->addHour(24);
                break;
            case 2:
                $expireDate = Carbon::parse($startDate)->addHour(72);
                break;
            case 3:
                $expireDate = Carbon::parse($startDate)->addHour(144);
                break;
        }
        
        $doctor->plans()->attach($request['plan'], [
            'starting_date' => $startDate,
            'expiration_date' => $expireDate
        ]);

        return redirect()->route('admin.home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function show(Plan $plan)
    {
        $doctor = Auth::user()->doctor;

        return view('admin.plans.show', compact('plan','doctor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function edit(Plan $plan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Plan $plan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plan $plan)
    {
        //
    }
}
