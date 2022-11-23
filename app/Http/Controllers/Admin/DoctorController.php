<?php

namespace App\Http\Controllers\Admin;

use App\Doctor;
use App\Http\Controllers\Controller;
use App\Plan;
use App\Specialization;
use App\Star;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.np
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctors = Doctor::orderBy('created_at', 'desc')->get();
        $specializations = Specialization::all();

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
            'specializations' => 'required|exists:specializations,id',

        ]);

        $params['slug'] = Doctor::getUniqueSlugFrom($params['name'], $params['surname']);

        // if (array_key_exists('photos', $params)) {
        //     $img_path = Storage::disk('photos')->put('post_covers', $params['image']);
        //     $params['cover'] = $img_path;
        // }

        $doctor = Doctor::create($params);
        // if ('specializations') {
        $specializations = $params['specializations'];
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
    public function show()
    {
        $doctor = Auth::user()->doctor;
        $stars = Star::all();
        $avg =DB::table('stars')
            ->select(DB::raw('round(avg(doctor_star.star_id), 1) as avg'))
            ->join('doctor_star', 'doctor_star.star_id', '=', 'stars.id')
            ->where('doctor_star.doctor_id', $doctor->id)
            ->get();

        $doctor->avg = $avg[0]->avg;


        return view('admin.doctors.show', compact('doctor', 'stars'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $doctor = Auth::user()->doctor;
        $specializations = Specialization::all();

        return view('admin.doctors.edit', compact('doctor', 'specializations'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $doctor = Auth::user()->doctor;
        
        $params = $request->validate([
            'name' => 'required|max:50|min:2',
            'surname' => 'required|max:50|min:1',
            'address'=> 'required',
            'specializations' => 'required', 'array', 'max:255',
            'telephone' => 'nullable|max:15',
            'services' => 'nullable|max:300',
            'cv' => 'nullable|mimes:pdf|max:4096',
            'image' => 'nullable|mimes:png,jpg,jpeg,svg|max:4096'
        ]);
        

        $params['slug'] = Doctor::getUniqueSlugFrom($params['name'],$params['surname']);

        if (array_key_exists('image', $params)) {
            if ($doctor->photo) {
                Storage::delete($doctor->photo);
            }
            $img_path = Storage::disk('public')->put('avatar', $params['image']);
            $params['image'] = $img_path;
            $doctor->photo = $img_path;
        }

        if (array_key_exists('cv', $params)) {
            if ($doctor->cv) {
                Storage::delete($doctor->cv);
            }
            $cv_path = Storage::disk('public')->put('cvs', $request->file('cv'));
            $params['cv'] = $cv_path;
            $doctor->cv = $cv_path;
        }

        $doctor->update($params);

        if (array_key_exists('specializations', $params)) {
            $doctor->specializations()->sync($params['specializations']);
        } else {
            $doctor->specializations()->sync([]);
        }
       

        return redirect()->route('admin.doctors.show', $doctor);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        $doctor = Doctor::where('id', Auth::user()->id)->first();
        $user = User::where('id', Auth::user()->id)->first();
        $deleted = $doctor->delete();
        
        if($deleted) {
            if (!empty($doctor->photo)) {
                Storage::disk('public')->delete($doctor->photo);
            }
            if (!empty($doctor->cv)) {
                Storage::disk('public')->delete($doctor->cv);
            }
        } 
        
        
        $user->delete();
        
        return redirect()->route('home');
    
    }
}
