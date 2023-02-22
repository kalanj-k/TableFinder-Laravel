<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentStoreRequest;
use App\Http\Requests\ContactStoreRequest;
use App\Models\Message;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;


class ContactController extends DefaultController
{
    public function index(){
        return view('pages.main.contact',$this->data);
    }

    public function store(ContactStoreRequest $request){
        DB::beginTransaction();
        $message = Message::create($request->all());
        DB::commit();
        return $message;
    }
}
