<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SocialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    private $name = ['twitter','facebook','instagram','discord'];
    private $link =['https://twitter.com','https://www.facebook.com/','https://www.instagram.com/','https://discord.com/'];

    public function run()
    {
        for($i=0;$i<count($this->name);$i++){
            DB::table('socials')->insert([
                'name'=>$this->name[$i],
                'link'=>$this->link[$i]
            ]);
        }
    }
}
