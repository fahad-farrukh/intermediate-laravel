<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    protected $toTruncate = ['users', 'lessons'];


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->toTruncate as $table) {
            DB::table($table)->truncate();
        }
        
        //DB::table('users')->truncate();
        
        $this->call(LessonsTableSeeder::class);
        
        $this->call(UsersTableSeeder::class);
    }
}
