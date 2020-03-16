<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Route::get('/', 'HomeController@welcome')->name('welcome');

// USER MANAGEMENT
Route::post('/formuser', 'UserController@store_user');
Route::get('/formuser', 'UserController@form_user');
Route::get('/listuser', 'UserController@list_user');

// PROJECT
Route::post('/formproject', 'ProjectController@store_project');
Route::get('/formproject', 'ProjectController@form_project');
Route::get('/listproject', 'ProjectController@list_project');
Route::get('/listproject/delete/{id}', 'ProjectController@delete_project');

// REPORT
Route::post('/dailyreports', 'ReportController@store_report');
Route::get('/dailyreports', 'ReportController@form_report');
Route::get('/calendar', 'ReportController@calendar');
Route::get('/calendar/detail/{report}', 'ReportController@report_detail');

// DEVELOPER REQUEST
Route::post('/devrequest', 'DeveloperRequestController@store_devrequest');
Route::get('/devrequest', 'DeveloperRequestController@form_devrequest');
Route::get('/list_dev_request', 'DeveloperRequestController@list_dev_request');
Route::get('/makepriority/{argue}/{id}', 'DeveloperRequestController@make_priority');


Route::get('/commandcenter', 'HomeController@command_center');
<<<<<<< HEAD
//  Go to Form User
Route::get('/formuser', 'HomeController@form_user');
// Go to Form Project
Route::get('/formproject', 'HomeController@form_project');
// List User
Route::get('/listuser', 'HomeController@list_user');
// List preject
Route::get('/listproject', 'HomeController@list_project');
Route::get('/listproject/{project_list}/editproject', 'HomeController@edit');
Route::put('/listproject/{project_list}', 'HomeController@update');

Route::get('/calendar', 'HomeController@calendar');
Route::get('/dailyreports', 'HomeController@form_report');
Route::get('/devrequest', 'HomeController@form_devrequest');
Route::get('/list_dev_request', 'HomeController@list_dev_request');
Route::get('/calendar/detail/{report}', 'HomeController@report_detail');
// Login and register
=======


// LOGIN 
>>>>>>> 31966d3e3eb36328247dfe465a71784cadbd986a
Auth::routes();
// HOME
Route::get('/', 'HomeController@index')->name('home');
