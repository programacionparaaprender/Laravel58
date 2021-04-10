<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //luiscorrea13711
        //luiscorrea1820
        EditorialWeb\User::create([
            'name' => 'Programacion para aprender',
            'email' => 'ejemplo@gmail.com',
            'password' => bcrypt('dfdgsgsdfdsfds'),
            'estado' => 1
        ]);
    }
}
