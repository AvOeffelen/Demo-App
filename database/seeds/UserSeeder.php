<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'firstname' => Str::random(10),
            'infix' => Str::random(3),
            'lastname' => Str::random(10),
            'email' => 'arrieality@gmail.com',
            'password' => Hash::make('testing'),
        ]);
        DB::table('users')->insert([
            'firstname' => Str::random(10),
            'infix' => Str::random(3),
            'lastname' => Str::random(10),
            'email' => 'krijgsmansolutions@test.com',
            'password' => Hash::make('testing'),
        ]);
    }
}
