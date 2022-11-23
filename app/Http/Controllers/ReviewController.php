<?php

namespace App\Http\Controllers;

use App\Doctor;
use App\Http\Controllers\Controller;
use App\Review;
use App\Star;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reviews = Review::where('doctor_id', Auth::user()->doctor['id'])->orderBy('created_at', 'desc')->get();
        $doctor = Doctor::find(Auth::user()->doctor['id']);

        return view('admin.reviews.index', compact('reviews', 'doctor'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        

        
        $data = $request->all();
        
        $request->validate([
            'name' => 'required|max:255|min:5',
            'comment' => 'required|max:400',
            'doctor_id'=>'required|exists:doctors,id',
        ]);      
        
        $doctor = Doctor::findOrFail($data['doctor_id']);
        // $doctor = DB::table('doctors')->find($data['doctor_id']);
    
        $review = new Review();
        $review->name = $data['name'];
        $review->comment = $data['comment'];
        $review->doctor_id = $data['doctor_id'];

        $review->save();
            
        return redirect()->route('guest.doctors.show', $doctor->slug);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function show(Review $review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function edit(Review $review)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Review $review)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function destroy(Review $review)
    {
        //
    }
}
