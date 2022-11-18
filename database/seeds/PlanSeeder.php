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

        for ($i = 0; $i < 50; $i++) {
            $plans = new Plan();

            
            $startDate = Carbon::today()->subDays(rand(0, 179))->addSeconds(rand(0, 86400));
            $sponsorType = rand(1, 3);

            switch ($sponsorType) {
                case 1:
                    $price = 2.99;
                    $type = 'Bronze';
                    $duration = 24;
                    $expireDate= Carbon::parse($startDate)->addHour(24);
                    break;
                case 2:
                    $price = 5.99;
                    $type = 'Silver';
                    $duration = 72;
                    $expireDate= Carbon::parse($startDate)->addHour(72);
                    break;
                case 3:
                    $price = 9.99;
                    $type = 'Gold';
                    $duration = 144;
                    $expireDate= Carbon::parse($startDate)->addHour(144);
                    break;
            }

            $plans->price = $price;
            $plans->type = $type;
            $plans->duration = $duration;

            $plans->save();



            $doctorIds = $doctors->shuffle()->take(rand(0, 5))->all();
            $plans->doctors()->attach($doctorIds,
                [
                'starting_date' => $startDate,
                'expiration_date' => $expireDate
                ]);

        }
    }
}
