<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $faker = Faker::create();
        for($i=0;$i<30;$i++) {
            $table = DB::table('comments')->insertGetId([
                'table_id'=>rand(1,12),
                'user_id' =>rand(1,20),
                'text' => $faker->text(rand(150,300)),
                'created_at'=> date('Y-m-d H:i:s',time())
            ]);
        }
    }
}
