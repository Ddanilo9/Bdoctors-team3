<?php

use App\Doctor;
use App\Message;
use Illuminate\Database\Seeder;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create('it_IT');

        $doctors = Doctor::all()->pluck('id');

        for ($i = 0; $i < 50; $i++) {
            $messages = new Message();

            $messages->name = $faker->firstName();
            $messages->message = $faker->paragraphs(rand(10, 20), true);
            $messages->email = $faker->email();
            $messages->doctor_id = $faker->randomElement($doctors);

            $messages->save();
        }
    }
}
