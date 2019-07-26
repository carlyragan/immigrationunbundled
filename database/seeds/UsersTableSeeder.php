<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;

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
        	'name' => 'yousaf ali',
        	'email'	=>	'ali.yousaf207@gmail.com',
        	'password'	=>	HASH::make('password'),
        	'remember_token'	=> str_random(10),
        ]);
    }
}
