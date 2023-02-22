<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $this->call([
            AdSeeder::class,
            CommentSeeder::class,
            DaySeeder::class,
            GameSystemsSeeder::class,
            LevelSeeder::class,
            MenuSeeder::class,
            SocialSeeder::class,
            TableSeeder::class,
            GameroleSeeder::class,
            RoleSeeder::class,
            UserSeeder::class
        ]);
    }
}
