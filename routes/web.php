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
Route::get('/listuser/delete/{id}', 'UserController@delete_user');

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
Route::get('/devrequest/delete/{id}', 'DeveloperRequestController@delete_request');


Route::get('/commandcenter', 'HomeController@command_center');


// LOGIN 
Auth::routes();
// HOME
Route::get('/', 'HomeController@index')->name('home');
