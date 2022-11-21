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

        for ($i = 1; $i < 6 ; $i++) { 
            $star = new Star();
            $star->number = $i;

            $star->save();
        }
    }
}
