<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeader extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
            'name'     => 'Franklin M Correia',
            'email'    => 'franklinmcorreia@gmail.com',
            'password' => bcrypt('123456'),
        ]);
    }
}
