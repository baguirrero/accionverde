<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Livewire\Admin\AdminEvent;
use Illuminate\Support\Facades\Route;

Route::redirect('', 'admin/persons');

Route::resource('persons', AdminController::class)->middleware('can:Leer casos registrados')->names('persons');

Route::get('persons/{person}/lawyer', [AdminController::class, 'lawyer'])->middleware('can:Asignar casos')->name('persons.lawyer');

Route::get('persons/{case}/event', AdminEvent::class)->middleware('can:Asignar casos')->name('persons.event');

Route::put('persons/{person}/assing', [AdminController::class, 'assing'])->name('persons.assing');

Route::resource('roles', RoleController::class)->middleware('can:Leer Roles')->names('roles');

Route::resource('users', UserController::class)->middleware('can:Leer Usuarios')->only('index', 'edit', 'update', 'store', 'destroy')->names('users');

Route::get('reports/index', [ReportController::class, 'index'])->name('reports.index');

Route::get('reports/age', [ReportController::class, 'age'])->name('reports.age');

Route::get('reports/timeconsult', [ReportController::class, 'timeconsult'])->name('reports.timeconsult');

Route::post('reports/mes', [ReportController::class, 'mes'])->name('reports.mes');

Route::post('reports/semana', [ReportController::class, 'semana'])->name('reports.semana');

Route::post('reports/niveled', [ReportController::class, 'niveled'])->name('reports.niveled');

Route::post('reports/residencia', [ReportController::class, 'residencia'])->name('reports.residencia');

Route::post('reports/empleab', [ReportController::class, 'empleab'])->name('reports.empleab');

Route::post('reports/años', [ReportController::class, 'años'])->name('reports.años');

Route::post('reports/tiempo', [ReportController::class, 'tiempo'])->name('reports.tiempo');

Route::get('reports/all', [ReportController::class, 'all'])->name('reports.all');