<?php

use App\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class adminSeeder extends Seeder
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
        ];
        foreach ($users as $user) {
            Admin::create($user);
        }

    }
}
