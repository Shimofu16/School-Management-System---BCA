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
        User::create([
            'name' => 'admin',
            'email' => 'admin@app.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'gender' => 'Male',
        ]);
        User::create([
            'name' => 'registrar',
            'email' => 'registrar@app.com',
            'password' => Hash::make('password'),
            'role' => 'registrar',
            'gender' => 'Male',
        ]);
        User::create([
            'name' => 'teacher',
            'email' => 'teacher@app.com',
            'password' => Hash::make('password'),
            'role' => 'teacher',
            'gender' => 'Male',
        ]);
        User::create([
            'name' => 'student',
            'email' => 'student@app.com',
            'password' => Hash::make('password'),
            'role' => 'student',
            'gender' => 'Male',
        ]);
    }
}
