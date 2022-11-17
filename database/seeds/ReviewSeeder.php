<?php

use App\Doctor;
use App\Review;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
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
            $reviews = new Review();

            $reviews->name = $faker->firstName();
            $reviews->comment = $faker->paragraphs(rand(10, 20), true);
            $reviews->email = $faker->email();
            $reviews->doctor_id = $faker->randomElement($doctors);

            $reviews->save();
        }
    }
}
