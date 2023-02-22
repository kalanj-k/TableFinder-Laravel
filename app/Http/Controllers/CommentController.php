<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentStoreRequest;
use App\Http\Requests\CommentUpdateRequest;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;
use Illuminate\Support\Facades\Log;

class CommentController extends DefaultController
{
    public function getCommentsForTable($id){
        $comments = new Comment();
        return $this->data['comments'] = $comments->getAllTableComments($id);
    }

    public function index(){
        $model = new Comment();
        $comments = $model->getAllComments();
        return $comments;
    }

    public function store(CommentStoreRequest $request){
        DB::beginTransaction();
        $comment = Comment::create([
            'table_id'=>$request->tableId,
            'user_id'=>$request->userId,
            'text'=>$request->text
        ]);
        DB::commit();
        //////
        $model = new User();
        $text=$request->ip()."\t".$request->url()."\t".session()->get('user')->username."\t"."Commented"."\t".date("Y-m-d H:i:s");
        $model->log($text);
        //////
        return $comment;
    }

    public function edit($id){
        $this->data['comment'] = Comment::all()->find($id);
        return view('pages.main.editComment', $this->data);
    }

    public function update(CommentUpdateRequest $request, $id){

        DB::beginTransaction();
        try{
            $comment = Comment::all()->find($id);
            $comment->update([
                'text'=>$request->commentText
            ]);
            DB::commit();
            //////
            $model = new User();
            $text=$request->ip()."\t".$request->url()."\t".session()->get('user')->username."\t"."Edited comment"."\t".date("Y-m-d H:i:s");
            $model->log($text);
            //////
            return redirect()->route('table',$comment->table_id)->with('successMsg','Comment updated.');
        }
        catch (Exception $ex){
            DB::rollBack();
            Log::error($ex->getMessage());
            return redirect()->route('comment.edit',$id)->with('errorMsg','Something went wrong.');
        }

    }

    public function destroy($id){
        $comment = Comment::all()->find($id);
        $result = $comment->delete();
        //////
        $model = new User();
        $text=\request()->ip()."\t".\request()->url()."\t".session()->get('user')->username."\t"."Deleted comment"."\t".date("Y-m-d H:i:s");
        $model->log($text);
        //////
        return $result;
    }
}
