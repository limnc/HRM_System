<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EmployeeController;
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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('dashboard',function(){
    return view('dashboard');
});

Route::get('dash',[HomeController::class,'dash']);
Route::get('/employees/{department}',[EmployeeController::class,'index']);
Route::get('addEmployee',[EmployeeController::class,'addEmployeePage']);
Route::post('addEmployee/add',[EmployeeController::class,'addEmployee']);
Route::get('/viewEmployee/{id}',[EmployeeController::class,'employeeDetailsPage']);
Route::get('/editEmployee/{id}',[EmployeeController::class,'editPage']);
Route::post('editEmployee/edit',[EmployeeController::class,'updateEmployee']);

Route::get('department',function(){
    return view('department');
});

Route::get('logout',function(){
    Session::flush();
    return redirect('/');
});
// Route::get('show',[EmployeeController::class,'show']);
// Route::get('array',[EmployeeController::class,'showArray']);