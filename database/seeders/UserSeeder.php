<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for($i=0;$i<20;$i++){
            $user = DB::table('users')->insertGetId([
                'username' => $faker->userName,
                'email'=>$faker->email,
                'password'=>md5('Table12!'),
                'image'=>'default.jpg',
                'alt'=>'default image',
                'about'=>$faker->text(200),
                'role_id'=>2,
                'created_at'=> date('Y-m-d H:i:s',time())
            ]);

            DB::table('users_game_roles')->insert([
                'user_id' => $user,
                'game_roles_id' => rand(1,2)
            ]);
        }

    }
}
