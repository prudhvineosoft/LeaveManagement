<?php

use App\Http\Controllers\LeaveController;
use App\Http\Controllers\LeaveManagement;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\StaffController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

//auth route for both 
Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index')->name('dashboard');
});

Route::get('/HodRegistration', [RegistrationController::class, 'hodRegistration']);
Route::get('/StaffRegistration', [RegistrationController::class, 'staffRegistration']);
Route::post('/addUserPost', [RegistrationController::class, 'addUser']);

// for HOD
Route::group(['middleware' => ['auth', 'role:HOD']], function () {
    Route::resource('/staff', StaffController::class);
    Route::resource('/LeaveManagement', LeaveManagement::class);
});

Route::group(['middleware' => ['auth', 'role:HOD|staff']], function () {
    Route::resource('/leaves', LeaveController::class);
});
require __DIR__ . '/auth.php';
