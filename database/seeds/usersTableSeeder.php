<?php

use Illuminate\Database\Seeder;

use App\User;

class usersTalbeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Roy Joseph',
            'email' => 'royjosephlatayan16@gmail.com',
            'password' => Hash::make('password'),
            'roles' => 'Registrar',
            'gender' => 'Male',
            'remember_token' => Str::random(10),
        ]);
    }
}
