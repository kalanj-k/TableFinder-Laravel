<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Log;
use Exception;

class LoginController extends DefaultController
{
    public function index(){

            return view('pages.main.login', $this->data);
    }
    public function store(LoginRequest $request){
        try{
            $roleId = Role::all()->where('name','=','admin')->first()->id;
            $user = User::with('roles')->where('email','=',$request->email)->first();
            if(!$user->password==md5($request->password)){
                return redirect()->route('login')->with('errorMsg','Password incorrect.');
            }
            else{
                session()->put('user',$user);
                //////
                $model = new User();
                $text=$request->ip()."\t".$request->url()."\t".$user->username."\t"."Logged in"."\t".date("Y-m-d H:i:s");
                $model->log($text);
                //////
                if($user->role_id==$roleId){
                    return redirect()->route('admin');
                }
                return redirect()->route('account',$user->id);
            }
        }catch(Exception $ex){
            Log::error($ex->getMessage());
            return redirect()->route('login')->with('errorMsg','Something went wrong, try again.');
        }
    }
    public function logout(){
        //////
        $model = new User();
        $text=\request()->ip()."\t".\request()->url()."\t".session()->get('user')->username."\t"."Logged out"."\t".date("Y-m-d H:i:s");
        $model->log($text);
        //////
        session()->remove('user');
        return redirect()->route('home');
    }
}
