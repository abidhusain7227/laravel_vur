<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmployeController;
use App\Http\Controllers\HomeController;
use App\Models\Employe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('register',[AuthController::class,'Register']);
Route::post('login',[AuthController::class,'Login']);
Route::get('getlogin',[AuthController::class,'Getlogin']);

Route::group(['middleware' =>["auth:sanctum"]],function(){
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::get('logout',[AuthController::class,'Logout']);
    Route::post('getemploye',[EmployeController::class,'Getemploye']);
    Route::post('getemployebyid',[EmployeController::class,'GetEmployeById']);
    Route::get('getdata',[EmployeController::class,'Getdata']);
    Route::post('addemploye',[EmployeController::class,'Addemploye']);
    Route::post('activeinactiveemploye',[EmployeController::class,'ActiveInactiveEmploye']);
    Route::post('editemploye',[EmployeController::class,'Editemploye']);
    Route::post('deleteemploye',[EmployeController::class,'Deleteemploye']);
});


