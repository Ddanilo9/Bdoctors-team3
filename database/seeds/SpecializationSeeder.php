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
            'Andrologia',
            'Cardiologia',
            'Chirurgia Generale',
            'Chirurgia Maxillo-facciale',
            'Chirurgia Pediatrica',
            'Chirurgia Plastica',
            'Dermatologia',
            'Dietologia',
            'Ecografia e Doppler',
            'Ematologia',
            'Endocrinologia',
            'Fisioterapia',
            'Gastroenterologia',
            'Ginecologia e Ostetricia',
            'Medicina dello Sport',
            'Medicina Estetica',
            'Medicina Legale',
            'Nefrologia',
            'Neurologia',
            'Oculistica',
            'Odontoiatria',
            'Omeopatia e Agopuntura',
            'Oncologia',
            'Ortopedia e Traumatologia',
            'Otorinolaringoiatria',
            'Pediatria',
            'Respiratorie',
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
