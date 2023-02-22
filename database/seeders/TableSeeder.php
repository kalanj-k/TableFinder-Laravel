<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    private $games=['Stranger Danger?','Mansions of Madness','Classic Warhammer FRP','Riding Against Armageddon','Evapoa - Undetermined','Stepping onto the path to glory',
        'Mothership RPG','Greater Upon Ashes','Shadowrun v4 Modified','Exalted Essence','Vampire the Masquerade v5','World of Wendrig'];
    private $gsystems=[1,2,3,4,5,6,7,8,9,10,11,12];

    public function run()
    {
        $faker = Faker::create();
        for($i=0;$i<count($this->games);$i++){
            $table = DB::table('tables')->insertGetId([
                'name' => $this->games[$i],
                'image'=>'defaultgame.png',
                'alt'=>'default image',
                'about'=>$faker->text(rand(300,700)),
                'game_master'=>rand(1,0),
                'date'=>date('Y-m-d'),
                'user_id'=>rand(1,20),
                'level_id'=>rand(1,3),
                'game_system_id'=>$this->gsystems[$i],
                'created_at'=> date('Y-m-d H:i:s',time())
            ]);

            DB::table('day_table')->insert([
                'day_id' => rand(1,7),
                'table_id' => $table
            ]);
        }
    }
}
