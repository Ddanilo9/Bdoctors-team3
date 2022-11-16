<?php

use App\Doctor;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;


class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $avatars = [
            'avatar/1.png',
            'avatar/2.png',
            'avatar/3.png',
            'avatar/4.png',
            'avatar/5.png',
            'avatar/6.png',
            'avatar/7.png',
            'avatar/8.png',
            'avatar/9.png',
            'avatar/10.png',
        ];
        $cvs = [
            'cv/1.pdf',
            'cv/2.pdf',
            'cv/3.pdf',
            'cv/4.pdf',
            'cv/5.pdf',
            'cv/6.pdf',
        ];

        
        
        $faker = \Faker\Factory::create('it_IT');

        for ($i = 0; $i < 50; $i++) {

            $doctor = new Doctor();

            $doctor->name = $faker->firstName();
            $doctor->surname = $faker->lastName();
            $doctor->address = $faker->address();
            $doctor->services = $faker->paragraphs(rand(10, 20), true);
            $doctor->photo = $faker->randomElement($avatars);
            $doctor->cv = $faker->randomElement($cvs);
            $doctor->telephone = $faker->phoneNumber();
            // $fullName = ($doctor->name;
            $doctor->slug = Str::slug($doctor->name . ' ' . $doctor->surname);

            $doctor->save();
        }
    }
}
