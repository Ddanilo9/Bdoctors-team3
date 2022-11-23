<?php

namespace App\Http\Controllers\Admin;

use App\Doctor;
use App\Http\Controllers\Controller;
use App\Message;
use App\Review;
use App\Star;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $lastMessage = Message::where('doctor_id', Auth::user()->doctor['id'])->orderBy('created_at', 'desc')->first();

        $lastReview = Review::where('doctor_id', Auth::user()->doctor['id'])->orderBy('created_at', 'desc')->first();

        $doctor = Doctor::find(Auth::user()->doctor['id']);


        return view('admin.home', compact('doctor', 'lastMessage', 'lastReview'));
        // $doctor = Auth::user()->doctor;
        // return view('admin.home', compact('doctor'));
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
    public function show()
    {
        // $lastMessage = Message::where('doctor_id', Auth::user()->doctor['id'])->orderBy('created_at', 'desc')->first();

        // $messages = Message::where('doctor_id', Auth::user()->doctor['id'])->orderBy('created_at', 'desc')->get();

        // $doctor = Doctor::find(Auth::user()->doctor['id']);


        // return view('admin.home', compact('doctor', 'messages'));
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
