<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Project_list;
use App\ProjectTimeline;
use DB;

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
        Project_list::where('projects_id', $id)->delete();
        return redirect('/listproject')->with('status', 'Deleted!');
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
    public function edit_project($id)
    {
        $data = Project_list::where('projects_id', $id)->get();
        $data = $data[0];
        $status = Project_list::get_status();
        return view('menu/editform/editproject', compact('data', 'status'));
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
            return redirect('listproject/edit/' . $id)
                ->withErrors($validator)
                ->withInput($request->except('password'));
        } else {
            // Update to database
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
    public function project_timeline()
    {
        $month = ProjectTimeline::get_month();
        $project_list = Project_list::all();
        $picked_month = 0;
        $picked_project = 0;
        $timeline = ProjectTimeline::all();
        if (sizeof($timeline) > 0) {
            $table = array();
            $rows = array();

            $table['cols'] = array(
                array('id' => 'ID', 'type' => 'string'),
                array('id' => 'Phase', 'type' => 'string'),
                array('id' => 'Project', 'type' => 'string'),
                array('id' => 'Start Date', 'type' => 'date'),
                array('id' => 'End Date', 'type' => 'date'),
                array('id' => 'Duration', 'type' => 'number'),
                array('id' => 'Percent Complete', 'type' => 'number'),
                array('id' => 'Depedencies', 'type' => 'string'),
            );

            foreach ($timeline as $t) {
                $temp = array();
                $temp[] = array('v' => $t->id);
                $temp[] = array('v' => $t->phase);
                $temp[] = array('v' => \App\Project_list::where('projects_id', $t->project)->first()->projects_name);
                $temp[] = array('v' => 'Date(' . date('Y', strtotime($t['start'])) . ',' . (date('m', strtotime($t['start'])) - 1) . ',' . date('d', strtotime($t['start'])) . ')');
                $temp[] = array('v' => 'Date(' . date('Y', strtotime($t['end'])) . ',' . (date('m', strtotime($t['end'])) - 1) . ',' . date('d', strtotime($t['end'])) . ')');
                $temp[] = array('v' => null);
                $temp[] = array('v' => $t->percent_done);
                $temp[] = array('v' => null);
                $rows[] = array('c' => $temp);
            }
            $table['rows'] = $rows;
            $jsonTable = json_encode($table);
        }
        if (isset($jsonTable)) {
            return view('menu/weektimeline', compact('project_list', 'month', 'picked_month', 'picked_project', 'jsonTable'));
        } else {
            return view('menu/weektimeline', compact('project_list', 'month', 'picked_month', 'picked_project'));
        }
    }
    public function project_timeline_form()
    {
        $phase = ProjectTimeline::get_phase();
        $project_list = Project_list::all();
        return view('menu.form.formtimeline', compact('phase', 'project_list'));
    }
    public function project_timeline_post(Request $request)
    {
        // Validating the input from the Form
        $validator = Validator::make($request->all(), [
            'project' => ['required', 'string'],
            'start' => ['required', 'date'],
            'end' => ['required', 'date'],
            'phase' => 'required'
        ]);
        // Send ERROR message 
        if ($validator->fails()) {
            return redirect('projecttimeline_form')
                ->withErrors($validator)
                ->withInput($request->except('password'));
        } else {
            $picked_project = $request->project;
            $checkboxes = $request->phase;
            foreach ($checkboxes as $checkbox) {
                // Insert to table project_timeline
                ProjectTimeline::create([
                    'user_id' => Auth::user()->id,
                    'project' => $picked_project,
                    'start' => $request->start,
                    'end' => $request->end,
                    'phase' => $checkbox,
                    'percent_done' => 0
                ]);
            }
            // Redirect to the List Project
            return redirect('/projecttimeline')->with('status', 'Success!');
        }
    }
    public function project_timeline_manipulation(Request $request)
    {
        $project_list = Project_list::all();
        $month = ProjectTimeline::get_month();
        $validator = Validator::make($request->all(), ['month' => ['required', 'between:0,12']]);
        if ($validator->fails()) {
            return redirect()->route('timeline_ori')
                ->withErrors($validator)
                ->withInput($request->except('password'));
        } else {
            $picked_month = $request->month;
            $picked_project = $request->project;
            if ($picked_month == 0 && $picked_project == 0) {
                $timeline = ProjectTimeline::all();
            } else {
                if ($picked_project == 0) {
                    $qu = sprintf("%02d", $picked_month);
                    $year = date("Y");
                    $timeline = ProjectTimeline::where(DB::RAW('month(start)'), $qu)->where(DB::RAW('year(start)'), $year)->get();
                } elseif ($picked_month == 0) {
                    $timeline = ProjectTimeline::where('project', $picked_project)->get();
                } else {
                    $qu = sprintf("%02d", $picked_month);
                    $year = date("Y");
                    $timeline = ProjectTimeline::where(DB::RAW('month(start)'), $qu)->where(DB::RAW('year(start)'), $year)->where('project', $picked_project)->get();
                }
            }
            if (sizeof($timeline) > 0) {
                $table = array();
                $rows = array();

                $table['cols'] = array(
                    array('id' => 'ID', 'type' => 'string'),
                    array('id' => 'Phase', 'type' => 'string'),
                    array('id' => 'Project', 'type' => 'string'),
                    array('id' => 'Start Date', 'type' => 'date'),
                    array('id' => 'End Date', 'type' => 'date'),
                    array('id' => 'Duration', 'type' => 'number'),
                    array('id' => 'Percent Complete', 'type' => 'number'),
                    array('id' => 'Depedencies', 'type' => 'string'),
                );

                foreach ($timeline as $t) {
                    $temp = array();
                    $temp[] = array('v' => $t->id);
                    $temp[] = array('v' => $t->phase);
                    $temp[] = array('v' => \App\Project_list::where('projects_id', $t->project)->first()->projects_name);
                    $temp[] = array('v' => 'Date(' . date('Y', strtotime($t['start'])) . ',' . (date('m', strtotime($t['start'])) - 1) . ',' . date('d', strtotime($t['start'])) . ')');
                    $temp[] = array('v' => 'Date(' . date('Y', strtotime($t['end'])) . ',' . (date('m', strtotime($t['end'])) - 1) . ',' . date('d', strtotime($t['end'])) . ')');
                    $temp[] = array('v' => null);
                    $temp[] = array('v' => $t->percent_done);
                    $temp[] = array('v' => null);
                    $rows[] = array('c' => $temp);
                }
                $table['rows'] = $rows;
                $jsonTable = json_encode($table);
            }
            if (isset($jsonTable)) {
                return view('menu/weektimeline', compact('jsonTable', 'project_list', 'month', 'picked_month', 'picked_project'));
            } else {
                return view('menu/weektimeline', compact('project_list', 'month', 'picked_month', 'picked_project'));
            }
        }
    }
}