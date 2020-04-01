<?php

namespace App\Http\Controllers;



class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function welcome()
    {
        return view('welcome');
    }

    // COMMAND CENTER
    public function command_center()
    {
        return view('menu/commandcenter');
    }
    
    public function project_timeline()
    {
        return view('menu/weektimeline');
    }
}
