<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\Models\User::create([
            'name'=>"Administrator",
            'email'=>"admin@gmail.com",
            'password'=>Hash::make('123'),
            'roles'=>"admin",
            'gender'=>"",
            'birthday'=>"",
            'country'=>"",
            'age'=>"",
            'plan'=>"",
            'alias'=>"",
            'about'=>"",
            'firstlogin'=>"0",
        ]);
    }
}
