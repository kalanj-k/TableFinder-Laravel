<?php

namespace App\Http\Controllers;

class AuthorController extends DefaultController
{
    public function index(){
        return view('pages.main.author',$this->data);
    }
}
