<?php

namespace App\Http\Controllers;

use DB;

use App\Http\Requests\HobbiesRequest;
use App\Models\Hobbies;
use Illuminate\Http\Request;

class HobbiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('hobbies');
    }

    public function getData()
    {
        return Hobbies::orderBy('name','ASC')->get();
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
    public function store(HobbiesRequest $request)

    {
        $pb =new Hobbies;
        $pb->name = $request->name;
        $pb->user_name = $request->user_name;
        $pb->email = $request->email;
        $pb->save();
        return $pb;

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hobbies  $hobbies
     * @return \Illuminate\Http\Response
     */
    public function show(Hobbies $hobbies)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Hobbies  $hobbies
     * @return \Illuminate\Http\Response
     */
    public function edit(Hobbies $hobbies)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Hobbies  $hobbies
     * @return \Illuminate\Http\Response
     */
    public function update(HobbiesRequest $request)
    {
        $pb = Hobbies::find($request->id);
        $pb->name = $request->name;
        $pb->user_name = $request->user_name;
        $pb->email = $request->email;
        $pb->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hobbies  $hobbies
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hobbies $hobbies)
    {
        Hobbies::where('id',$hobbies->id)->delete();
    }
}
