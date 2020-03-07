<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use App\UserInformation;

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
    public function store_user(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'gender' => ['required', 'string', 'max:255'],
            'date_of_birth' => ['required', 'string', 'max:255'],
            'place_of_birth' => ['required', 'string', 'max:255'],
            'nik' => ['required', 'string', 'max:255'],
            'tanggal_bergabung' => ['required', 'string', 'max:255'],
            'tanggal_lulus_probation' => ['required', 'string', 'max:255'],
            'department' => ['required', 'string', 'max:255'],
            'jabatan' => ['required', 'string', 'max:255'],
            'role' => ['required', 'string', 'max:255'],
        ]);
        // process the login
        if ($validator->fails()) {
            return redirect('contact/create')
            ->withErrors($validator)
            ->withInput($request->except('password'));
        } else {
            // store
            $store             = new UserInformation;
            $store->name = $request->name;
            $store->alamat = $request->alamat;
            $store->gender = $request->gender;
            $store->date_of_birth = $request->date_of_birth;
            $store->place_of_birth = $request->place_of_birth;
            $store->nik = $request->nik;
            $store->tanggal_bergabung = $request->tanggal_bergabung;
            $store->tanggal_lulus_probation = $request->tanggal_lulus_probation;
            $store->department = $request->department;
            $store->jabatan = $request->jabatan;
            $store->role = $request->role;
            $store->save();
        
            // redirect
            return redirect('/listuser');
        }
    }
}
