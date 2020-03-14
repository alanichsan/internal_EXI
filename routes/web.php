<?php

use App\Report;
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

// Insert Input from Form User
Route::post('/formuser', 'HomeController@store_user');
// Insert Input from Form project
Route::post('/formproject', 'HomeController@store_project');

Route::post('/dailyreports', 'HomeController@store_report');
Route::post('/devrequest', 'HomeController@store_devrequest');

// Sidebar Menu
Route::get('/commandcenter', 'HomeController@command_center');
//  Go to Form User
Route::get('/formuser', 'HomeController@form_user');
// Go to Form Project
Route::get('/formproject', 'HomeController@form_project');
// List User
Route::get('/listuser', 'HomeController@list_user');
// List preject
Route::get('/listproject', 'HomeController@list_project');
Route::get('/calendar', 'HomeController@calendar');
Route::get('/dailyreports', 'HomeController@form_report');
Route::get('/devrequest', 'HomeController@form_devrequest');
Route::get('/list_dev_request', 'HomeController@list_dev_request');
Route::get('/calendar/detail/{report}', 'HomeController@report_detail');
Route::get('/makepriority/{argue}/{id}', 'HomeController@make_priority');
// Login and register
Auth::routes();
// Home
Route::get('/', 'HomeController@index')->name('home');
