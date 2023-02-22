<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\Comment;
use App\Models\Day;
use App\Models\GameRoles;
use App\Models\Table;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Exception;
use Illuminate\Support\Facades\DB;

class AccountController extends DefaultController
{
    protected $user;

    private $table;
    public function __construct()
    {
        parent::__construct();
        $this->table = new Table();
    }

    public function index(){
        $users = User::getAllUsers();
        return $users;
    }

    public function show($id){
        $testUser = new User();
        $comment = new Comment();
        $comments = $comment->getUsersComments($id);
        $user = User::with('gameroles')->find($id);
        $this->data['user'] = $user;
        $this->data['tables'] = $this->table->getAllTablesFromUser($id);
        $this->data['comments'] = $comments;
        return view('pages.main.account',$this->data);
    }

    public function create(Request $request){
        if($request->ajax()){
            $roles = Role::all();
            return response()->json(['roles'=>$roles]);
        }else{
            $this->data['roles'] = Role::all();
            return view('pages.main.createUser',$this->data);
        }

    }

    public function store(UserStoreRequest $request){
        DB::beginTransaction();
        try{
            $user = User::create([
                'username' => $request->username,
                'email' => $request->email,
                'password' => md5($request->password),
                'image'=> 'default.jpg',
                'alt'=> 'default image',
                'role_id' => $request->role,
                'about' => ''
            ]);
            DB::commit();

            return response()->json(['feedback'=>'Added successfully.']);
        }catch (Exception $ex){
            DB::rollBack();
            Log::error($ex->getMessage());
            return response()->json(['feedback'=>'Something went wrong.']);
        }
    }

    public function edit($id){
        if(\request()->ajax()){
            $roles = Role::all();
            $user = User::all()->find($id);
            return response()->json(['roles'=>$roles,'user'=>$user]);
        }

        $this->data['roles'] = GameRoles::all();
        $this->data['user'] = User::with('gameroles')->find($id);
        return view('pages.main.editUser',$this->data);
    }

    public function update(Request $request, $id){

        if($request->ajax()){
            User::validateAdminsUpdate($request);
            DB::beginTransaction();
            $user = User::all()->find($id);
            $newpass = md5($request->password);
            $user->update($request->except('password')+['password'=>$newpass]);
            DB::commit();
            return response()->json(['feedback'=>'Updated successfully.']);
        }else{
            User::validateUsersUpdate($request);
            DB::beginTransaction();
            try{
                $user = User::all()->find($id);
                $user->update($request->except('image'));
                $user->gameroles()->sync($request->gameroles);
                if($request->has('userImg')){
                    $imgName = $request->file('userImg')->getClientOriginalName();
                    $exploded = explode('.',$imgName);
                    $newImgName = time().'-'.$exploded[0].'.'.$request->file('userImg')->guessExtension();
                    $request->userImg->move(public_path('assets/img'),$newImgName);
                    $user->image = $newImgName;
                    $user->save();
                }
                ///////////
                $model = new User();
                $text=\request()->ip()."\t".\request()->url()."\t".session()->get('user')->username."\t"."Edited account"."\t".date("Y-m-d H:i:s")."\n";
                $model->log($text);
                ///////////
                DB::commit();
                return redirect()->route('account',$id)->with('successMsg','Account updated.');
            }catch (Exception $ex){
                DB::rollBack();
                Log::error($ex->getMessage());
                return redirect()->route('account.update',$id)->with('errorMsg','Something went wrong.');
            }
        }

    }

    public function getAllUsers(){
        return $this->data['users'] = User::getAllUsers();
    }

    public function destroy($id){

        $user = User::all()->find($id);
        $user->gameroles()->detach();
        $user->delete();

        return response()->json(['feedback'=>'Deleted successfully.']);

    }

}
