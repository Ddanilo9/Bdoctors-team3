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
        // return User::create([
        //     'name' => $data['name'],
        //     'email' => $data['email'],
        //     'password' => Hash::make($data['password']),
        // ]);

        // $user = new User();
        // $doctor = new Doctor();
        // $specialization = new Specialization();
        // $specialization->spec_name = $data['spec_name'];
        $this->user->email = $data['email'];
        $this->user->password = Hash::make($data['password']);
        $this->user->name = $data['name'];
        $this->user->save();
        

        $this->doctor->surname = $data['surname'];
        $this->doctor->address = $data['address'];
        $this->doctor->name = $data['name'];
        $this->doctor->slug = $params['slug'] = Doctor::getUniqueSlugFrom($this->doctor->name,$this->doctor->surname);
        $this->doctor->user_id = $this->user->id;
        $this->doctor->save();

        // $this->user->email = Input::get('email');
        // $this->user->password = Hash::make(Input::get('password'));
        // $this->something->users()->save($this->user);
        
        
        // $user->doctors()->sync($doctor->id);
        // $user->specializations()->sync($specialization->id);
        // $user->specialization()->sync($data['specializations']);

        
    }
}
