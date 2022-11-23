<?php
namespace App\Http\Controllers;
use App\Doctor;
use App\Home;
use App\Specialization;
use Illuminate\Http\Request;
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
    public function store(Request $request)
    {
        //
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Home  $home
     * @return \Illuminate\Http\Response
     */
    public function show($doctor)
    {
        $doctors = Doctor::where('slug',$doctor)->get();
        return view('guest.doctors.show', compact('doctors'));
        // })->where('id', '[0-9]+') ->name('comics');
        // return view('guest.doctors.show/', compact('doctor.slug'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Home  $home
     * @return \Illuminate\Http\Response
     */
    public function edit(Home $home)
    {
        //
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Home  $home
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Home $home)
    {
        //
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Home  $home
     * @return \Illuminate\Http\Response
     */
    public function destroy(Home $home)
    {
        //
    }
}
