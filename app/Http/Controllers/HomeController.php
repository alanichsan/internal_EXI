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
<<<<<<< HEAD
    
    public function week_timeline()
    {
        return view('menu/weektimeline');
    }
    public function form_timeline()
    {
        return view('menu/form/formtimeline');
    }
=======
>>>>>>> e9d4c4ebe2f1df566fd146727f27825a995ccf00
}
