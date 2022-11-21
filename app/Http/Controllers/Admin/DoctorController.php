<?php

namespace App\Http\Controllers\Admin;

use App\Doctor;
use App\Http\Controllers\Controller;
use App\Plan;
use App\Specialization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctors = Doctor::orderBy('created_at', 'desc')->get();
        $specializations = Specialization::all();
       
        
            
        // dd($duration);
    
        return view('admin.doctors.index', compact('doctors', 'specializations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $doctors = Doctor::orderBy('created_at', 'desc')->get();
        $specializations = Specialization::all();

        return view('admin.doctors.create', compact('doctors', 'specializations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd(request()->all());
        $params = $request->validate([
            
            'photo' => 'nullable|image|max:2048',
            'name' => 'required|max:255|min:5',
            'surname' => 'required',
            'address' => 'required|regex:/(^[-0-9A-Za-z.,\/ ]+$)/',
            'telephone' => 'required',
            'services' => 'nullable',
            "cv" => 'nullable|mimes:pdf|max:10000',
            'specializations' => 'required',

        ]);

        $params['slug'] = Doctor::getUniqueSlugFrom($params['name'],$params['surname']);

        // if (array_key_exists('photos', $params)) {
        //     $img_path = Storage::disk('photos')->put('post_covers', $params['image']);
        //     $params['cover'] = $img_path;
        // }

        $doctor = Doctor::create($params);
        // if ('specializations') {
         $specializations = $params['specializations'];
            // dd($tags);
            $doctor->specializations()->sync($specializations);
        // }

        return redirect()->route('admin.doctors.show', $doctor);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function show(Doctor $doctor)
    {
        // $doctors = Doctor::orderBy('created_at', 'desc')->get();
        // $specializations = Specialization::all();

        return view('admin.doctors.show', compact('doctor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function edit(Doctor $doctor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Doctor $doctor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Doctor $doctor)
    {
        //
    }
}
