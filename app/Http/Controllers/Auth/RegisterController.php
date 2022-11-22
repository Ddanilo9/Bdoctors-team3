<?php

namespace App\Http\Controllers\Auth;

use App\Doctor;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Specialization;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(User $user, Doctor $doctor)
    {
        $this->middleware('guest');
        $this->user = $user;
        $this->doctor = $doctor;
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'surname' => 'required',
            'address' => 'required|regex:/(^[-0-9A-Za-z.,\/ ]+$)/',
            'spec_name' => ['required', 'array', 'max:255'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {

        $user = new User();
        $user->email = $data['email'];
        $user->password = Hash::make($data['password']);
        // $user->name = $data['name'];
        $user->save();


        $doctor = new Doctor();
        $doctor->name = $data['name'];
        $doctor->surname = $data['surname'];
        $doctor->address = $data['address'];
        $doctor->slug = $params['slug'] = Doctor::getUniqueSlugFrom($doctor->name,$doctor->surname);
        $doctor->user_id = $user->id;
        $doctor->save();

        foreach($data['spec_name'] as $sn){
            $specialization = new Specialization();
            $specialization->spec_name = $sn;
            $specialization->save();
            $doctor->specializations()->attach($specialization->id);
        }
        return $user;
        
    }
}
