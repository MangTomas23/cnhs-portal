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
            'firstname' => 'admin',
            'lastname' => 'admin',
            'gender' => 'm',
            'birthdate' => '1994-11-13',
            'created_at' => '2015-12-27 10:40:19',
        	'updated_at' => '2015-12-27 10:40:19',
        ]);
    }
}
