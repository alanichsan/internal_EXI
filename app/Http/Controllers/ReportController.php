<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Report;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function calendar()
    {
        return view('menu/calendar');
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
        // Send ERROR message 
        if ($validator->fails()) {
            return redirect('dailyreports')
                ->withErrors($validator)
                ->withInput($request->except('password'));
        } else {
            // Check if user actually had login before
            if (Auth::check()) {
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
            } else {
                return redirect('/login')->with('status', 'Failed!');
            }
        }
    }
    public function form_report()
    {
        $project_list = \App\Project_list::all();
        return view('menu/form/formdailyreport', compact('project_list'));
    }

    public function report_detail($report)
    {
        // Check if data is exist
        if (\App\Report::where('id', $report)->exists()) {
            $data = \App\Report::where('id', $report)->get();
            // Check whose data
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
}
