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
    public function form_user()
    {
        return view('menu/formuser');
    }
    public function list_user()
    {
        return view('menu/listuser');
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
            // Check if user actually had login before
            if (Auth::check()) {
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
            } else {
                return redirect('/login')->with('status', 'Failed!');
            }
        }
    }
}