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

// Sidebar Menu
Route::get('/commandcenter', function () {
    return view('menu/commandcenter');
});
//  Go to Form User
Route::get('/formuser', function () {
    return view('menu/formuser');
});
// Go to Form Project
Route::get('/formproject', function () {
    return view('menu/formproject');
});
// List User
Route::get('/listuser', function () {
    return view('menu/listuser');
});
// List preject
Route::get('/listproject', function () {
    return view('menu/listproject');
});
Route::get('/calendar', function () {
    return view('menu/calendar');
});
Route::get('/dailyreports', function () {
    return view('menu/formdailyreport');
});
Route::get('/calendar/detail/{report}', function($report){
    return view('show/reportdetail', compact('report'));
});
// Login and register
Auth::routes();
// Home
Route::get('/', 'HomeController@index')->name('home');
