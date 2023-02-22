<?php

namespace App\Http\Controllers;

use App\Http\Requests\TableStoreRequest;
use App\Http\Requests\TableUpdateRequest;
use App\Models\Ad;
use App\Models\Comment;
use App\Models\Day;
use App\Models\Level;
use App\Models\GameSystems;
use App\Models\Table;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class TableController extends DefaultController
{


    public function index(){
        if(\request()->ajax()){
            $tables = Table::with('user')->get();
            return $tables;
        }else{
            $tables = Table::getAllTables();
            $this->data['tables'] = $tables;
            $this->data['levels'] = Level::all();
            $this->data['days'] = Day::all();
            $this->data['gameSystems'] = GameSystems::all();
            $this->data['ads'] = Ad::where('active',1)->get();
            return view('pages.main.tables',$this->data);
        }
    }

    public function show($id){
        $table = new Table();
        $this->data['table'] = $table->getOneTable($id);

        $comments = new Comment();
        $this->data['comments'] = $comments->getAllTableComments($id);
        return view('pages.main.table', $this->data);
    }
    public function create(){
        $this->data['days'] = Day::all();
        $this->data['levels'] = Level::all();
        $this->data['gameSystems'] = GameSystems::all();
        return view('pages.main.createTable', $this->data);
    }

    public function store(TableStoreRequest $request){

        DB::beginTransaction();
        try{
            $table = Table::create([
                'name' => $request->name,
                'image'=>'defaultgame.png',
                'alt'=>'deeeef',
                'about'=> $request->about,
                'game_master'=> $request->gm,
                'date' => date('Y-m-d'),
                'user_id' => $request->user_id,
                'level_id' => $request->level,
                'game_system_id' => $request->gsys
            ]);
            $table->days()->attach($request->days);
            if($request->has('image')){
                $imgName = $request->file('image')->getClientOriginalName();
                $exploded = explode('.',$imgName);
                $newImgName = time().'-'.$exploded[0].'.'.$request->file('image')->guessExtension();
                $request->image->move(public_path('assets/img'),$newImgName);
                $table->image = $newImgName;
                $table->save();
            }
            ///////////
            $model = new User();
            $text=\request()->ip()."\t".\request()->url()."\t".session()->get('user')->username."\t"."Created table"."\t".date("Y-m-d H:i:s");
            $model->log($text);
            ///////////
            DB::commit();
            return redirect()->route('account',session()->get('user')->id)->with('successMsg', 'Table added.');
        }catch(\Exception $ex){
            DB::rollBack();
            Log::error($ex->getMessage());
            return redirect()->route('table.create')->with('errorMsg','Something went wrong.');
        }
    }

    public function edit($id){

        if(\request()->ajax()){
            $table = Table::all()->find($id);
            return $table;
        }else{
            $this->data['table'] = Table::with('days')->find($id);
            $this->data['days'] = Day::all();
            $this->data['levels'] = Level::all();
            $this->data['gameSystems'] = GameSystems::all();
            return view('pages.main.editTable', $this->data);
        }
    }

    public function update(Request $request, $id){
        if(\request()->ajax()){
            Table::validateAdminsUpdate($request);
            DB::beginTransaction();
            $table = Table::all()->find($id);
            $table->update($request->all());
            DB::commit();
            return response()->json(['feedback'=>'Updated successfully.']);
        }else{
            Table::validateUsersUpdate($request);
            DB::beginTransaction();
            try{
                $table = Table::all()->find($id);
                $table->update($request->except('image'));
                $table->days()->sync($request->days);
                if($request->has('image')){
                    $imgName = $request->file('image')->getClientOriginalName();
                    $exploded = explode('.',$imgName);
                    $newImgName = time().'-'.$exploded[0].'.'.$request->file('image')->guessExtension();
                    $request->image->move(public_path('assets/img'),$newImgName);
                    $table->image = $newImgName;
                    $table->save();
                }
                ///////////
                $model = new User();
                $text=\request()->ip()."\t".\request()->url()."\t".session()->get('user')->username."\t"."Updated table"."\t".date("Y-m-d H:i:s");
                $model->log($text);
                ///////////
                DB::commit();
                return redirect()->route('table',$id)->with('successMsg','Table updated.');
            }catch(Exception $ex){
                DB::rollBack();
                Log::error($ex->getMessage());
                return redirect()->route('table.edit',$id)->with('errorMsg','Something went wrong.');
            }
        }
    }

    public function destroy($id){
        $table = Table::all()->find($id);
        $table->days()->detach();
        $table->delete();
        ///////////
        $model = new User();
        $text=\request()->ip()."\t".\request()->url()."\t".session()->get('user')->username."\t"."Deleted table"."\t".date("Y-m-d H:i:s");
        $model->log($text);
        ///////////
        if(\request()->ajax()){
            return response()->json(['feedback'=>'Deleted successfully.']);
        }else{
            return redirect()->route('account',session()->get('user')->id)->with('successMsg','Table deleted.');
        }
    }

//    public function getAllTables(){
//        return $this->data['tables'] = Table::getAllTables();
//    }


    public function filterTables(Request $request){
        $table = new Table();
        if($request->has('all')){
            $result = $table::getAllTables();
        }else{
            $result = $table->filterTables($request);
        }

        return response()->json($result);
    }
}
