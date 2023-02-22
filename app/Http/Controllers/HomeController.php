<?php

namespace App\Http\Controllers;

use App\Models\Social;
use Illuminate\Http\Request;

class HomeController extends DefaultController
{

    public function index(){
        $this->data['socials'] = Social::all();
        return view('pages.main.home', $this->data);
    }

    public function error(){
        return view('pages.main.error', $this->data);
    }
}
