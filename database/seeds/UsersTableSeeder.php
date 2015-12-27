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
        DB::table('users')->insert([
        	'username' => 'admin',
        	'password' => bcrypt('1234567890'),
            'type' => 'admin',
            'firstname' => ' ',
            'lastname' => ' ',
            'gender' => 'm',
        	'birthdate' => '0000-00-00',
        ]);
    }
}
