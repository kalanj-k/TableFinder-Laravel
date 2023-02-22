<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    private $levels = ['Beginner','Intermediate','Advanced'];

    public function run()
    {
        for($i=0;$i<count($this->levels);$i++){
            DB::table('levels')->insert([
                'name'=>$this->levels[$i]
            ]);
        }
    }
}
