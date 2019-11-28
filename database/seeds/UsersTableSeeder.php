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
        App\User::create([

        		'name'     => 'amelion jorge',
        		'email'    => 'a@gmail.com',
        		'password' => bcrypt('111111111'),
        	]);

         App\User::create([

                'name'     => 'janilson duarte',
                'email'    => 'jduarte@interdigitos.co.ao',
                'password' => bcrypt('123456789'),
            ]);
    }
}
