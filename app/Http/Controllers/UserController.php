<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\UserInformation;
use App\User;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function form_user()
    {
        $role = User::get_role();
        $department = User::get_department();
        $gender = User::get_gender();
        return view('menu/form/formuser', compact('role', 'department', 'gender'));
    }
    public function list_user()
    {
        return view('menu/list/listuser');
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
    public function delete_user($id)
    {
        if (Auth::user()->id != $id) {
            User::where('id', $id)->delete();
            UserInformation::where('users_id', $id)->delete();

            return redirect('/listuser')->with('status', 'Deleted!');
        } else {
            return redirect('/listuser')->with('status', 'Failed!');
        }
    }
    public function edit_user($id)
    {
        $user = User::where('id', $id)->get();
        $user = $user[0];
        $userinfo = $user->users_information[0];
        $role = User::get_role();
        $department = User::get_department();
        $gender = User::get_gender();
        return view('menu/edituser', compact('user', 'role', 'department', 'gender', 'userinfo'));
    }
    public function edit_user_store(Request $request, $id)
    {
        // Validating the input from the Form Project
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
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
        // Send ERROR message 
        if ($validator->fails()) {
            return redirect('listuser')
                ->withErrors($validator)
                ->withInput($request->except('password'));
        } else {
            User::where('id', $id)
                ->update([
                    'email' => $request->email,
                    'password' => Hash::make('password'),
                ]);
            UserInformation::where('users_id', $id)
                ->update([
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
            // Redirect to the List Project
            return redirect('/listuser')->with('status', 'Success!');
        }
    }
}
