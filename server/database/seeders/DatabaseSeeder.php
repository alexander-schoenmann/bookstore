<?php

namespace Database\Seeders;

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
        $this->call(UsersTableSeeder::class); //user wird zuerst angelegt
        $this->call(AuthorsTableSeeder::class); //author wird angelegt
        $this->call(BooksTableSeeder::class); //dann wird book mit user angelegt
    }
}
