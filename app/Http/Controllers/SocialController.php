<?php

namespace App\Http\Controllers;

use App\Http\Requests\SocialStoreRequest;
use App\Http\Requests\SocialUpdateRequest;
use App\Models\Social;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SocialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $socials = Social::all();
        return $socials;
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
    public function store(SocialStoreRequest $request)
    {
        DB::beginTransaction();
        $social = Social::create($request->all());
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
        $social = Social::all()->find($id);
        return response()->json($social);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SocialUpdateRequest $request, $id)
    {
        $social = Social::all()->find($id);
        DB::beginTransaction();
        $social->update($request->all());
        DB::commit();
        return response()->json(['feedback'=>'Updated successfully.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $social = Social::all()->find($id);
        $result = $social->delete();
        return $result;
    }
}
