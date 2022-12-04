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
            'Allergologia',
            'Cardiologia',
            'Chirurgia Generale',
            'Chirurgia Plastica',
            'Dermatologia',
            'Dietologia',
            'Fisioterapia',
            'Ginecologia e Ostetricia',
            'Medicina dello Sport',
            'Neurologia',
            'Oculistica',
            'Odontoiatria',
            'Otorinolaringoiatria',
            'Pediatria',
            'Psichiatria',
            'Psicologia',
            'Radiologia',
            'Urologia',
        ];

        $faker = \Faker\Factory::create('it_IT');

        foreach ($specList as $spec) {
            $s = new Specialization();
            $s->spec_name = $spec;

            $s->save();
        }
    }
}
