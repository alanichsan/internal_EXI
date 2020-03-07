<?php

namespace App\Http\Controllers;

use App\UserInformation;
use Illuminate\Http\Request;

class HomesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('menu/formuser');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|size:255'    
        ]);
        UserInformation::create($request->all());

        return redirect('/listuser');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\UserInformation  $home
     * @return \Illuminate\Http\Response
     */
    public function show(UserInformation $home)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UserInformation  $home
     * @return \Illuminate\Http\Response
     */
    public function edit(UserInformation $home)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UserInformation  $home
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserInformation $home)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UserInformation  $home
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserInformation $home)
    {
        //
    }
}
