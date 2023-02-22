<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GameSystemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    private $gamesystems = ['Dungeons and Dragons','Call of Cthulhu', 'Warhammer Fantasy Roleplay','Genesys','Pathfinder','Castles & Crusades','Mothership','Homebrew',
        'Shadowrun','Exalted','Vampire: The Masquerade 5th Ed','2d20'];

    public function run()
    {
        for($i=0;$i<count($this->gamesystems);$i++){
            DB::table('game_systems')->insert([
                'name'=>$this->gamesystems[$i]
            ]);
        }
    }
}
