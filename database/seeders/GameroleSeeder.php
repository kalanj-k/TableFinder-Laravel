<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GameroleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    private $gameroles = ['Game Master','Player Character'];

    public function run()
    {
        for($i=0;$i<count($this->gameroles);$i++){
            DB::table('game_roles')->insert([
                'name'=>$this->gameroles[$i]
            ]);
        }
    }
}
