<?php

use App\Specialization;
use Illuminate\Database\Seeder;

class SpecializationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $specList = [
            'neurologia',
            'dentista',
            'urologia'
        ];

        $faker = \Faker\Factory::create('it_IT');

        for ($i = 0; $i < 50; $i++) {
            $s = new Specialization();

            $s->name = $faker->randomElement($specList);

            $s->save();
        }
    }
}
