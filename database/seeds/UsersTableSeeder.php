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
        User::create([
            'name' => 'team3',
            'email' => 'team3@gmail.com',
            'password' => Hash::make('ciao134'),
        ]);
    }
}
