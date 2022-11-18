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
            SpecializationSeeder::class,
            StarSeeder::class,
            PlanSeeder::class,
            DoctorSeeder::class,
            ReviewSeeder::class,
            MessageSeeder::class

        ]);
    }
}
