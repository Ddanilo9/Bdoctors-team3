<?php

use App\Doctor;
use App\Specialization;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Carbon\Carbon;


class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $cvs = [
            'cvs/1.pdf',
            'cvs/2.pdf',
            'cvs/3.pdf',
            'cvs/4.pdf',
            'cvs/5.pdf',
            'cvs/6.pdf',
        ];



        $faker = \Faker\Factory::create('it_IT');

        // $users = User::all();
        $specializations = Specialization::all()->pluck('id');
        $doctors = config('doctors');


        foreach ($doctors as $user) {

            $doctor = new Doctor();
            $doctor->user_id = $user['user_id'];

            $doctor->name = $user['name'];
            $doctor->surname = $user['surname'];
            $doctor->address = $faker->address();
            $doctor->services = $user['services'];
            $doctor->photo = $user['photo'];
            $doctor->cv = $faker->randomElement($cvs);
            $doctor->telephone = $faker->phoneNumber();

            $fullName = $doctor->name . ' ' . $doctor->surname;
            $doctor->slug = Str::slug($fullName);

            $doctor->save();


            // Stars vote
            $starNumber = [];
            for ($i = 0; $i < 4; $i++) {
                $number = rand(1,5);

                $starNumber[] = $number;
            }
            $doctor->stars()->attach($starNumber);

            // Specialization
            $specializationIds = $specializations->shuffle()->take(rand(1, 2))->all();
            $doctor->specializations()->sync($specializationIds);


            // Sponsor
            for ($i = 0; $i < 4; $i++) {
                $sponsorType= rand(1,3);
                $startDate = Carbon::today()->subDays(rand(0, 179))->addSeconds(rand(0, 86400));

                switch ($sponsorType) {
                    case 1:
                        $plan['plan_id'] = '1';
                        $expireDate = Carbon::parse($startDate)->addHour(24);
                        break;
                    case 2:
                        $plan['plan_id'] = '2';
                        $expireDate = Carbon::parse($startDate)->addHour(72);
                        break;
                    case 3:
                        $plan['plan_id'] = '3';
                        $expireDate = Carbon::parse($startDate)->addHour(144);
                        break;
                }

                $doctor->plans()->attach($plan['plan_id'],  [
                    'starting_date' => $startDate,
                    'expiration_date' => $expireDate
                ]);
            }

        }
    }
}
