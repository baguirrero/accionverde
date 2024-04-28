<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Lawyer\CaseController;
use App\Http\Livewire\Lawyer\CaseEvent;
use Illuminate\Support\Facades\Route;

Route::redirect('', 'lawyer/cases');

Route::resource('cases', CaseController::class)->middleware('can:Leer casos asignados')->names('cases');

Route::get('cases/{case}/event', CaseEvent::class)->middleware('can:Editar casos asignados')->name('cases.event');

Route::post('cases/{case}/status', [CaseController::class, 'status'])->name('cases.status');

Route::post('cases/{case}/close', [CaseController::class, 'close'])->name('cases.close');