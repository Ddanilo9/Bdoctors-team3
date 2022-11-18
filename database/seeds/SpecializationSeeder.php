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
            'urologia',
            'ginecologia',
            'radiologia',
            'cardiologia',
            'pediatria'
        ];

        $faker = \Faker\Factory::create('it_IT');

        foreach ($specList as $spec) {
            $s = new Specialization();
            $s->name = $spec;

            $s->save();
        }
        // for ($i = 0; $i < count($specList); $i++) {
        //     $s = new Specialization();
        //     if (condition) {
        //         # code...
        //     }
        //     $s->name = $faker->randomElement($specList);

        //     $s->save();
    }
}
