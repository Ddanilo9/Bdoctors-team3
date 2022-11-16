<?php

use App\Star;
use Illuminate\Database\Seeder;

class StarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create('it_IT');

        for ($i=0; $i <50 ; $i++) { 
            $star = new Star();

            $star->number = $faker->numberBetween(0, 5);

            $star->save();
        }
    }
}
