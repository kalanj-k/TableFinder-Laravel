<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    private $days = ['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday'];

    public function run()
    {
        for($i=0;$i<count($this->days);$i++){
            DB::table('days')->insert([
                'name'=>$this->days[$i]
            ]);
        }
    }
}
