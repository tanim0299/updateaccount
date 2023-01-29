<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BackendController;
use App\Http\Controllers\MainMenuController;
use App\Http\Controllers\SubMenuController;
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
    return redirect('/login');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home',[BackendController::class,'index']);

Route::post('mainMenuStatusChange', [MainMenuController::class,'mainMenuStatusChange']);


Route::post('subMenuStatusChange', [SubMenuController::class,'subMenuStatusChange']);

Route::post('employeeStatusChange', [EmployeeController::class,'employeeStatusChange']);
Route::resources([
    'main_menu'=> MainMenuController::class,
    'sub_menu'=> SubMenuController::class,
    'employee_info'=> EmployeeController::class,
]);
