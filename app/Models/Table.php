<?php

namespace App\Models;

use App\Http\Controllers\TableController;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Table extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'image',
        'alt',
        'about',
        'game_master',
        'level_id',
        'user_id',
        'game_system_id',
        'date'
    ];

    public static function validateUsersUpdate($request){
        $request->validate([
            'name' => 'required',
            'image' => 'image|max:2000|mimes:jpg,png,jpeg',
            'days' => 'required|exists:days,id',
            'gm' => 'required',
            'gsys'=> 'required|exists:game_systems,id',
            'level' => 'required|exists:levels,id'
        ],[
            'name.required' => 'Name is required.',
            'image' => 'Uploaded file must be .jpg/.jpeg or .png',
            'image.image' => 'Uploaded file must be an image.',
            'image.max' => 'Uploaded file must not be larger than :max kilobytes.',
            'days.exists' => 'The selected day does not exist.',
            'days.required' => 'Days required.',
            'gsys.required' => 'Game system is required.',
            'gsys.exists' => 'Game system is required.',
            'level.required' => 'Level is required.'
        ]);
    }

    public static function validateAdminsUpdate($request){
        $request->validate([
            'name' => 'required',
            'about' => 'required'
        ]);
    }

    public static function getAllTables(){
        return Table::with('days')
            ->join('levels', 'tables.level_id','=','levels.id')
            ->join('game_systems', 'tables.game_system_id','=','game_systems.id')
            ->select('tables.*','levels.name as l_name','game_systems.name as gs_name')
            ->orderBy('id','asc')
            ->paginate(4);
    }

    public function getAllTablesFromUser($id){
        return Table::with('days')
            ->join('levels', 'tables.level_id','=','levels.id')
            ->join('game_systems', 'tables.game_system_id','=','game_systems.id')
            ->where('tables.user_id','=',$id)
            ->select('tables.*','levels.name as l_name','game_systems.name as gs_name')
            ->get();
    }
    public function getOneTable($id){
        return Table::with('days')
            ->join('levels', 'tables.level_id','=','levels.id')
            ->join('game_systems', 'tables.game_system_id','=','game_systems.id')
            ->join('users', 'tables.user_id','=','users.id')
            ->where('tables.id','=',$id)
            ->select('tables.*','levels.name as l_name','game_systems.name as gs_name','users.username as u_name')
            ->first();
    }

    public function filterTables(Request $request){

            $query= Table::with('days')
                ->join('levels', 'tables.level_id','=','levels.id')
                ->join('game_systems', 'tables.game_system_id','=','game_systems.id');

            // gmaster
            if($request->has('gmaster') && $request->get('gmaster')!=''){
                $query = $query->where('tables.game_master', $request->gmaster);
            }
             // system
            if($request->has('gsys') && $request->get('gsys')!=0){
                $query = $query->where('tables.game_system_id',$request->gsys);
            }
            // level
            if($request->has('lvl')  && $request->get('lvl')!=0){
                $query = $query->where('tables.level_id',$request->lvl);
            }
            // name
            if($request->has('name')){
                $query = $query->where('tables.name', 'like', '%'.$request->name.'%');
            }
            // days
            if($request->has("days")){
                $query = $query->whereHas("days", function($d) use ($request){
                    $d->whereIn("days.id", $request->input("days"));
                 });
            }

            $query = $query->select('tables.*','levels.name as l_name','game_systems.name as gs_name');

            if($request->has('sortCol') && $request->has('sortCol')){
                $query = $query->orderBy($request->sortCol,$request->sortVal);
            }
            else{
                $query = $query->orderBy('tables.id','asc');
            }


            $query = $query->paginate(4);


            return $query;
    }

    public function days(){
        return $this->belongsToMany(Day::class,'day_table');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function level(){
        return $this->belongsTo(Level::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }
}
