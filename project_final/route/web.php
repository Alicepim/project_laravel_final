<?php

use App\Http\Controllers\DataController;
use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
})->name('home');
Route::get('form', function () {
    return view('form');
});
//ดึงข้อมูล
Route::get('/', [EmployeeController::class, 'employeeData']);
//เพิ่มข้อมูล
Route::post('insertData', [EmployeeController::class, 'insertEm'])->name('insertData');
//ลบข้อมูล
Route::get('deleteData/{id}', [EmployeeController::class, 'deleteData'])->name('deleteData');
//แก้ไขข้อมูล
Route::get('editData/{id}', [EmployeeController::class, 'editData'])->name('editData');
Route::post('updateData/{id}', [EmployeeController::class, 'updateData'])->name('updateData');
//ดึงข้อมูลทั้งหมดมาแสดง
Route::get('detail', [DataController::class, 'emData']);