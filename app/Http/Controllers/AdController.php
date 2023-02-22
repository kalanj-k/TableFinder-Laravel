<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdStoreRequest;
use App\Http\Requests\AdUpdateRequest;
use App\Models\Ad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Ad::all();
        return $data;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdStoreRequest $request)
    {
        DB::beginTransaction();

            $imgName = $request->file('image')->getClientOriginalName();
            $exploded = explode('.',$imgName);
            $newImgName = time().'-'.$exploded[0].'.'.$request->file('image')->guessExtension();
            $request->image->move(public_path('assets/img'),$newImgName);

        $ad = Ad::create([
            'link'=>$request->link,
            'text'=>$request->text,
            'active'=>$request->activity,
            'image'=>$newImgName
        ]);
        DB::commit();
        return response()->json(['feedback'=>'Added successfully.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ad = Ad::all()->find($id);
        return response()->json($ad);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdUpdateRequest $request, $id)
    {
        $ad = Ad::all()->find($id);
        DB::beginTransaction();

        if($request->has('image')){
            $imgName = $request->file('image')->getClientOriginalName();
            $exploded = explode('.',$imgName);
            $newImgName = time().'-'.$exploded[0].'.'.$request->file('image')->guessExtension();
            $request->image->move(public_path('assets/img'),$newImgName);
            $ad->update([
                'link'=>$request->link,
                'text'=>$request->text,
                'image'=>$newImgName,
                'active'=>$request->activity
            ]);
        }else{
            $ad->update([
                'link'=>$request->link,
                'text'=>$request->text,
                'active'=>$request->activity
            ]);
        }
        DB::commit();
        return response()->json(['data'=>'ok']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ad = Ad::all()->find($id);
        $ad->delete();
        return response()->json(['msg'=>'Deleted']);
    }
}
