<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

//        factory(\College\Student::class, 3)->create();

      //  factory(\College\Books::class, 2)->create();
        //factory(\College\Role::class, 4)->create();
        factory(\College\Subject::class, 12)->create();


    }
}
