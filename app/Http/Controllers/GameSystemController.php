<?php

namespace App\Http\Controllers;

use App\Http\Requests\GameSystemStoreRequest;
use App\Http\Requests\GameSystemUpdateRequest;
use App\Models\GameSystems;
use App\Models\Table;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GameSystemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $systems = GameSystems::all();
        return $systems;
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
    public function store(GameSystemStoreRequest $request)
    {
        DB::beginTransaction();
        $system = GameSystems::create($request->all());
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
        $system = GameSystems::all()->find($id);
        return $system;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GameSystemUpdateRequest $request, $id)
    {
        $system = GameSystems::all()->find($id);
        DB::beginTransaction();
        $system->update($request->all());
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

    }
}
