<?php

use App\Specialization;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UsersTableSeeder::class,
            DoctorSeeder::class,
            MessageSeeder::class,
            PlanSeeder::class,
            ReviewSeeder::class,
            SpecializationSeeder::class,
            StarSeeder::class

        ]);
        
    }
}
