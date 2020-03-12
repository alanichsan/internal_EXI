<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use App\UserInformation;
use App\Project_list;
use App\Report;
use App\User;
use Illuminate\Support\Facades\Auth;

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
        // Validating the input from the Form User
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'gender' => ['required', 'string', 'max:255'],
            'date' => ['required', 'date', 'max:255'],
            'place' => ['required', 'string', 'max:255'],
            'nik' => ['required', '', 'max:255'],
            'bergabung' => ['required', 'date', 'max:255'],
            'lulus' => ['required', 'date', 'max:255'],
            'department' => ['required', 'string', 'max:255'],
            'jabatan' => ['required', 'string', 'max:255'],
            'role' => ['required', 'string', 'max:255'],
        ]);
        // Send Error
        if ($validator->fails()) {
            return redirect('formuser')
            ->withErrors($validator)
            ->withInput($request->except('password'));
        } else {
            // Insert to table users
            $user = User::create([
                'email' => $request->email,
                'password' => Hash::make('password'),
            ]);
            // Insert to table users_information
            UserInformation::create([
                'users_id' => $user['id'],
                'name' => $request->name,
                'alamat' => $request->alamat,
                'gender' => $request->gender,
                'date_of_birth' => $request->date,
                'place_of_birth' => $request->place,
                'nik' => $request->nik,
                'tanggal_bergabung' => $request->bergabung,
                'tanggal_lulus_probation' => $request->lulus,
                'department' => $request->department,
                'jabatan' => $request->jabatan,
                'role' => $request->role
            ]);
        
            // Redirect to the List User
            return redirect('/listuser')->with('status', 'Success!');
        }
    }
    public function store_Project(Request $request)
    {
        // Validating the input from the Form Project
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'perusahaan' => ['required', 'string', 'max:255'],
            'status' => ['required', 'string', 'max:255']
        ]);
        if ($validator->fails()) {
            return redirect('formproject')
            ->withErrors($validator)
            ->withInput($request->except('password'));
        } else {
            // Insert to table list_projects
            Project_list::create([
                'projects_name' => $request->name,
                'perusahaan' => $request->perusahaan,
                'status_projects' => $request->status
            ]);
            // Redirect to the List Project
            return redirect('/listproject')->with('status', 'Success!');
        }
    }
    public function store_report(Request $request)
    {
        // Validating the input from the Form Project
        $validator = Validator::make($request->all(), [
            'report' => ['required', 'string'],
            'project' => ['required', 'string'],
            'start' => ['required', 'date'],
            'end' => ['required', 'date']
        ]);
        if ($validator->fails()) {
            return redirect('dailyreports')
            ->withErrors($validator)
            ->withInput($request->except('password'));
        } else {
            // Insert to table list_projects
            Report::create([
                'name' => Auth::user()->users_information[0]->name,
                'content' => $request->report,
                'project' => $request->project,
                'start' => $request->start,
                'end' => $request->end
            ]);
            // Redirect to the List Project
            return redirect('/calendar')->with('status', 'Success!');
        }
    }
}