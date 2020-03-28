<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Project_list;

class ProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function list_project()
    {
        return view('menu/list/listproject');
    }
    public function form_project()
    {
        $status = Project_list::get_status();
        return view('menu/form/formproject', compact('status'));
    }
    public function delete_project($id)
    {
        if (Auth::check()) {
            Project_list::where('projects_id', $id)->delete();

            return redirect('/listproject')->with('status', 'Deleted!');
        } else {
            return redirect('/login')->with('status', 'Failed!');
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
        // Send ERROR message 
        if ($validator->fails()) {
            return redirect('formproject')
                ->withErrors($validator)
                ->withInput($request->except('password'));
        } else {
            // Check if user actually had login before
            if (Auth::check()) {
                // Insert to table list_projects
                Project_list::create([
                    'projects_name' => $request->name,
                    'perusahaan' => $request->perusahaan,
                    'status_projects' => $request->status
                ]);
                // Redirect to the List Project
                return redirect('/listproject')->with('status', 'Success!');
            } else {
                return redirect('/login')->with('status', 'Failed!');
            }
        }
    }
    public function edit_project($id)
    {
        $data = Project_list::where('projects_id', $id)->get();
        $data = $data[0];
        $status = Project_list::get_status();
        return view('menu/editproject', compact('data', 'status'));
    }
    public function edit_project_store(Request $request, $id)
    {
        // Validating the input from the Form Project
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'perusahaan' => ['required', 'string', 'max:255'],
            'status' => ['required', 'string', 'max:255']
        ]);
        // Send ERROR message 
        if ($validator->fails()) {
            return redirect('formproject')
                ->withErrors($validator)
                ->withInput($request->except('password'));
        } else {
            Project_list::where('projects_id', $id)
                ->update([
                    'projects_name' => $request->name,
                    'perusahaan' => $request->perusahaan,
                    'status_projects' => $request->status
                ]);
            // Redirect to the List Project
            return redirect('/listproject')->with('status', 'Update Success!');
        }
    }
}
