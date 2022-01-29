<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            ['name' => 'admin', 'email' => 'admin@app.com', 'password' => Hash::make('password'), 'role' => 'admin', 'gender' => 'Male',],
            ['name' => 'registrar', 'email' => 'registrar@app.com', 'password' => Hash::make('password'), 'role' => 'registrar', 'gender' => 'Male',],
            ['name' => 'teacher', 'email' => 'teacher@app.com', 'password' => Hash::make('password'), 'role' => 'teacher', 'gender' => 'Male',],
            ['name' => 'student', 'email' => 'student@app.com', 'password' => Hash::make('password'), 'role' => 'student', 'gender' => 'Male',]
        ];
        foreach ($users as $user) {
            User::create($user);
        }
    }
}
