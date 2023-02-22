<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['table_id','user_id','text'];

    public function getAllTableComments($id){
        return DB::table('comments')
            ->join('users', 'comments.user_id','=','users.id')
            ->join('tables', 'comments.table_id','=','tables.id')
            ->where('comments.table_id','=',$id)
            ->select('comments.*','users.image as userimg','users.username as username','tables.user_id as tabowner')
            ->get();
    }

    public function getUsersComments($id){
        return DB::table('comments')
            ->join('tables','comments.table_id','=','tables.id')
            ->where('comments.user_id','=',$id)
            ->select('comments.*','tables.name as tname')
            ->get();
    }

    public function getAllComments(){
        return DB::table('comments')
            ->join('users', 'comments.user_id','=','users.id')
            ->join('tables', 'comments.table_id','=','tables.id')
            ->select('comments.*','users.username as username','tables.name as tablename')
            ->orderByDesc('comments.created_at')
            ->get();
    }

    public function tables(){
        return $this->belongsTo(Table::class);
    }
    public function users(){
        return $this->belongsTo(User::class);
    }
}
