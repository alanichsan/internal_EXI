<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Request as AppRequest;

class DeveloperRequestController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function list_dev_request()
    {
        // Calling data with paginate
        $array = \App\Request::paginate(10);
        // Check authority to do priority action
        $authority = false;

        if (Auth::user()->users_information[0]->department == 'IT') {
            $authority = true;
        }
        return view('menu/list/listdevrequest', compact('array', 'authority'));
    }
    // Priority management
    public function make_priority($argue, $id)
    {
        // Check if user's role is literally IT
        if (Auth::user()->users_information[0]->department == 'IT') {
            if ($argue == 'makeone') {
                \App\Request::where('id', $id)->update(['priority' => 1]);
            } elseif ($argue == 'makezero') {
                \App\Request::where('id', $id)->update(['priority' => 0]);
            }
            return redirect('list_dev_request');
        } else {
            return redirect('/')->with('status', 'Failed!');
        }
    }
    public function store_devrequest(Request $request)
    {
        // Validating the input from the Form Project
        $validator = Validator::make($request->all(), [
            'title' => ['required', 'string'],
            'content' => ['required', 'string'],
            'project' => ['required', 'integer']
        ]);
        // Send ERROR message 
        if ($validator->fails()) {
            return redirect('devrequest')
                ->withErrors($validator)
                ->withInput($request->except('password'));
        } else {
            // Check if user actually had login before
            if (Auth::check()) {
                // Insert to table list_projects
                AppRequest::create([
                    'user_id' => Auth::user()->id,
                    'title' => $request->title,
                    'content' => $request->content,
                    'project' => $request->project,
                    'priority' => 0
                ]);
                // Redirect to the List Project
                return redirect('list_dev_request')->with('status', 'Success!');
            } else {
                return redirect('/login')->with('status', 'Failed!');
            }
        }
    }
    public function form_devrequest()
    {
        // Check user's Role
        if (Auth::user()->users_information[0]->role != 'Director') {
            return abort(404);
        } else {
            $project_list = \App\Project_list::all();
            return view('menu/form/formdevrequest', compact('project_list'));
        }
    }
    public function delete_request($id)
    {
        //Check user's authority
        if (Auth::check() || Auth::user()->id != $id) {
            AppRequest::where('id', $id)->delete();

            return redirect('/list_dev_request')->with('status', 'Deleted!');
        } else {
            return redirect('/login')->with('status', 'Failed!');
        }
    }
    public function edit_request($id)
    {
        $data = \App\Request::where('id', $id)->get();
        $data = $data[0];
        $project_list = \App\Project_list::all();
        return view('menu/editform/editrequest', compact('data', 'project_list'));
    }
    public function edit_request_store(Request $request, $id)
    {
        // Validating the input from the Form Request
        $validator = Validator::make($request->all(), [
            'title' => ['required', 'string'],
            'content' => ['required', 'string'],
            'project' => ['required', 'integer']
        ]);
        // Send ERROR message 
        if ($validator->fails()) {
            return redirect('devrequest/edit/' . $id)
                ->withErrors($validator)
                ->withInput($request->except('password'));
        } else {
            // Update to database
            \App\Request::where('id', $id)
                ->update([
                    'title' => $request->title,
                    'content' => $request->content,
                    'project' => $request->project
                ]);
            // Redirect to the List Project
            return redirect('/list_dev_request')->with('status', 'Update Success!');
        }
    }
}
