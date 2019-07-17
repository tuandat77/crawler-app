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
        $this->call(EditUserTableSeeder::class);
        $this->call(DeleteUserTableSeeder::class);
        $this->call(AddUserTableSeeder::class);
    }
}
