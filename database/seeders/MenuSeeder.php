<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    private $menus = ['Home','Author','Log In','Sign Up','Contact','Tables','Account','Admin'];
    private $routes =['home','author','login','register','contact','tables','account','admin'];
    private $visibility =[0,0,1,1,0,2,2,3];

    public function run()
    {
        for($i=0;$i<count($this->menus);$i++){
            DB::table('menus')->insert([
                'name'=>$this->menus[$i],
                'route'=>$this->routes[$i],
                'visibility'=>$this->visibility[$i]
            ]);
        }
    }
}
