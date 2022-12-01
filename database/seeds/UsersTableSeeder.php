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
        // $faker = \Faker\Factory::create('it_IT');
        $users = config('users');
        foreach ($users as $user ) {
            $newUser = new User();
            // $newUser->name = $faker->firstName();
            $newUser->email =$user['email'];
            $newUser->password = Hash::make($user['password']);
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
