<?php

namespace App\Http\Controllers;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\DB;
use Exception;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use App\Models\Role;

class RegisterController extends DefaultController
{
    public function index(){
        return view('pages.main.register',$this->data);
    }

    public function register(RegisterRequest $request){
        DB::beginTransaction();
        try{
            $role = Role::all()->where('name','=','user')->first()->id;
            $data = $request->all();
            $user = User::create([
                'username' => $data['username'],
                'email'=>$data['email'],
                'password'=>md5($data['password']),
                'image'=>'default.jpg',
                'alt'=> 'default image',
                'about'=>'',
                'role_id'=>$role
            ]);
            DB::commit();
            return redirect()->route('login');
        }catch(Exception $ex){
            DB::rollBack();
            Log::error($ex->getMessage());
            return redirect()->route('register')->with('errorMsg','Something went wrong, try again.');
        }
    }
}
