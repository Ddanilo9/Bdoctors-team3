<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create('it_IT');

        for ($i = 0; $i < 50; $i++) {
            $newUser = new User();
            $newUser->name = $faker->firstName();
            $newUser->email = $faker->email();
            $newUser->password = Hash::make('123456789');
            $newUser->save();
        }

        // User::create(
        //     [
        //         'name' => 'team3',
        //         'email' => 'team3@gmail.com',
        //         'password' => Hash::make('ciao134'),
        //         ]
        //     );
    }
}
