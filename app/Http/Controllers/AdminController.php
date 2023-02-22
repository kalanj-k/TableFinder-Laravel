<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends DefaultController
{
    public function index(){
        $this->data['test'] = Ad::where('active','1')->get();
        return view('pages.main.admin',$this->data);
    }

    public function readLog(Request $request){

        $filter = null;
        $send = null;
        if($request->has('filter')){
            $filter = $request->filter;
        }

        if(Storage::disk('local')->exists('log.txt')){
            $data = Storage::get('log.txt');
            $send = explode("\r\n",$data);
            if($filter){
                $filtered=[];
                foreach($send as $item){
                    $items = explode("\t",$item);
                    $date = explode(" ",$items[4]);
                    if($filter==$date[0]){
                        $filtered[]=$item;
                    }
                }
                $send=$filtered;
            }
        }
        return response()->json(['data'=>$send]);
    }

//    public function createUser(){
//        return view('pages.main.createUser',$this->data);
//    }

}
