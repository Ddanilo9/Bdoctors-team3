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
        $plans =[
            [
                'price' => '2.99',
                'type' => 'Bronze',
                'duration' => 24,
            ],
            [
                'price' => '5.99',
                'type' => 'Silver',
                'duration' => 72,
            ],
            [
                'price' => '9.99',
                'type' => 'Gold',
                'duration' => 144,
            ],
        ];

        foreach ($plans as $plan) {
            $newPlan = new Plan();
            $newPlan->price = $plan['price'];
            $newPlan->type = $plan['type'];
            $newPlan->duration = $plan['duration'];
          
            $newPlan->save();
        }




        // $doctors = Doctor::all()->pluck('id');

        // for ($i = 0; $i < 50; $i++) {
        //     $plans = new Plan();


        //     $sponsorType = rand(1, 3);

        //     switch ($sponsorType) {
        //         case 1:
        //             $price = 2.99;
        //             $type = 'Bronze';
        //             $duration = 24;
        //             break;
        //         case 2:
        //             $price = 5.99;
        //             $type = 'Silver';
        //             $duration = 72;
        //             break;
        //         case 3:
        //             $price = 9.99;
        //             $type = 'Gold';
        //             $duration = 144;
        //             break;
        //     }

        //     $plans->price = $price;
        //     $plans->type = $type;
        //     $plans->duration = $duration;

        //     $plans->save();
        // }
    }
}
