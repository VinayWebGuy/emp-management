<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Login;
use App\Livewire\EmployeeForm;
use App\Livewire\AllEmployees;
use App\Livewire\EditEmployee;
use App\Livewire\ImportEmployees;


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
    return view('welcome');
});

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/login', Login::class)->name('login');

Route::middleware(['admin'])->group(function () {
    Route::get('/admin/employee_form', EmployeeForm::class)->name('admin.employee_form');
    Route::get('/admin/all_employees', AllEmployees::class)->name('admin.all_employees');
    Route::get('/admin/import_employees', ImportEmployees::class)->name('admin.import_employees');
    Route::get('/admin/edit_employee/{id}', EditEmployee::class)->name('admin.edit_employee');


    Route::post('/admin/logout', function () {
        Auth::guard('admin')->logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect()->route('login');
    })->name('admin.logout');
});