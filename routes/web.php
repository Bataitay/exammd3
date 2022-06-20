<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\GroupEController;
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



Route::group(['middleware' => ['auth']], function () {
    Route::get('/', [GroupEController::class, 'index'])->name('groupEmployee.index');
    Route::get('/create', [GroupEController::class, 'create'])->name('groupEmployee.create');
    Route::post('/store', [GroupEController::class, 'store'])->name('groupEmployee.store');
    Route::delete('/destroy/{id}', [GroupEController::class, 'destroy'])->name('groupEmployee.destroy');


    Route::get('employees', [EmployeeController::class, 'index'])->name('employees.index');
    Route::get('employees/create', [EmployeeController::class, 'create'])->name('employees.create');
    Route::post('employees/store', [EmployeeController::class, 'store'])->name('employees.store');
    Route::get('employees/{id}/edit', [EmployeeController::class, 'edit'])->name('employees.edit');
    Route::put('employees/{id}/update', [EmployeeController::class, 'update'])->name('employees.update');
    Route::delete('employees/{id}/destroy', [EmployeeController::class, 'destroy'])->name('employees.destroy');
});
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
