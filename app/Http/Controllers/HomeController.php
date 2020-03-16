<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use App\UserInformation;
use App\Project_list;
use App\Report;
use App\Request as AppRequest;
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
    // public function welcome()
    // {
    //     return view('welcome');
    // }

    // devrequest
    public function form_devrequest()
    {
        if (Auth::user()->users_information[0]->role != 'Director') {
            return abort(404);
        } else {
            $project_list = \App\Project_list::all();
            return view('menu/formdevrequest', compact('project_list'));
        }
    }

    public function store_devrequest(Request $request)
    {
        // Validating the input from the Form Project
        $validator = Validator::make($request->all(), [
            'title' => ['required', 'string'],
            'request' => ['required', 'string'],
            'project' => ['required', 'integer']
        ]);
        if ($validator->fails()) {
            return redirect('devrequest')
                ->withErrors($validator)
                ->withInput($request->except('password'));
        } else {
            // Insert to table list_projects
            AppRequest::create([
                'user_id' => Auth::user()->id,
                'title' => $request->title,
                'content' => $request->request,
                'project' => $request->project,
                'priority' => 0
            ]);
            // Redirect to the List Project
            return redirect('/')->with('status', 'Success!');
        }
    }

    // Daily Report
    public function form_report()
    {
        $project_list = \App\Project_list::all();
        return view('menu/formdailyreport', compact('project_list'));
    }

    public function report_detail($report)
    {
        if (\App\Report::where('id', $report)->exists()) {
            $data = \App\Report::where('id', $report)->get();
            if ($data[0]->user_id == Auth::user()->id) {
                $users = \App\User::where('id', $data[0]->user_id)->get();
                $project = \App\Project_list::where('projects_id', $data[0]->project)->get();
                return view('show/reportdetail', compact('data', 'users', 'project'));
            } else {
                return abort(404);
            }
        } else {
            return abort(404);
        }
    }

    public function store_report(Request $request)
    {
        // Validating the input from the Form Project
        $validator = Validator::make($request->all(), [
            'title' => ['required', 'string'],
            'report' => ['required', 'string'],
            'project' => ['required', 'integer'],
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
                'user_id' => Auth::user()->id,
                'title' => $request->title,
                'content' => $request->report,
                'project' => $request->project,
                'start' => $request->start,
                'end' => $request->end
            ]);
            // Redirect to the List Project
            return redirect('/calendar')->with('status', 'Success!');
        }
    }

    // User
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

    // Project
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

    public function edit(Project_list $project_list)
    {
        Project_list::where('projects_id', $project_list->projects_id)->get();
        return view('menu/editproject', compact('project_list'));
    }
    public function update(Request $request, Project_list $project_list)
    {
        dd('$request');
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'perusahaan' => ['required', 'string', 'max:255'],
            'status' => ['required', 'string', 'max:255']
        ]);

        Project_list::where('projects_id', $project_list->projects_id)
            ->update([
                'projects_name' => $request->name,
                'perusahaan' => $request->perusahaan,
                'status_projects' => $request->status
            ]);
        return redirect('menu/listproject')->with('status', 'Data Changnge!');
    }







    // Route Session
    public function command_center()
    {
        return view('menu/commandcenter');
    }
    public function form_user()
    {
        return view('menu/formuser');
    }
    public function form_project()
    {
        return view('menu/formproject');
    }
    public function list_user()
    {
        return view('menu/listuser');
    }
    public function list_project()
    {
        return view('menu/listproject');
    }
    public function calendar()
    {
        return view('menu/calendar');
    }
    public function list_dev_request()
    {
        return view('menu/listdevrequest');
    }
}
