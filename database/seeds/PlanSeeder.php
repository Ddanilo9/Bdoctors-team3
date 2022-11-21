<?php

use App\Doctor;
use App\Plan;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
// use Illuminate\Support\Carbon;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $doctors = Doctor::all()->pluck('id');


        $plans = [
            [
                'type' => 'Bronze',
                'price' => 2.99,
                'duration' => 24
            ],
            [
                'type' => 'Silver',
                'price' => 5.99,
                'duration' => 72
            ],
            [
                'type' => 'Gold',
                'price' => 9.99,
                'duration' => 144
            ]
        ];


        foreach ($plans as $plan) {
            $p = new Plan();

            $p->type = $plan['type'];
            $p->price = $plan['price'];
            $p->duration = $plan['duration'];
            $p->save();
        }

    }
}
