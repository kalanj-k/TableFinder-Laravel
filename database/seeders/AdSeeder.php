<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    private $text = ['The Table Top Game Shop','BUY NOW - 20% OFF','Buy Board Games'];
    private $link =['https://www.thetabletopgameshop.com/','https://www.redbubble.com/','https://www.board-game.co.uk/'];
    private $image =['ad1.jpg','ad2.jpg','ad3.jpg'];

    public function run()
    {
        for($i=0;$i<count($this->text);$i++){
            DB::table('ads')->insert([
                'link'=>$this->link[$i],
                'text'=>$this->text[$i],
                'image'=>$this->image[$i]
            ]);
        }
    }
}
