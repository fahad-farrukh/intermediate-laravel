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
        factory('App\User', 50)->create([ // Overide fields values defined in database/factories/ModelFactory.php
            'name' => 'John Doe'
        ]);
        //factory('App\User', 50)->create();
    } 
}
