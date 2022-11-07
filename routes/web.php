<?php
use App\Http\Controllers\EmployeeController;


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

route::get('/employees',[EmployeeController::class,'index'])->name('employees.list');
route::get('/employees/create',[EmployeeController::class,'create'])->name('employees.create');
route::post('/employees',[EmployeeController::class,'store'])->name('employees.store');
Route::get('/employees/{employee}/show', [EmployeeController::class, 'show'])->name('employees.show');
Route::get('/employees/{employee}/edit', [EmployeeController::class, 'edit'])->name('employees.edit');
route::put('/employees/{employee}',[EmployeeController::class,'update'])->name('employees.update');
Route::delete('/employees/{employee}/{id}', [EmployeeController::class, 'destroy'])->name('employees.destory');
Route::get('/employees/{id}', [EmployeeController::class, 'test'])->name('employees.test');
Route::resource('employees', EmployeeController::class);