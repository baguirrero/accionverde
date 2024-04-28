<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;

Route::redirect('', 'form/register');


Route::resource('register', FormController::class)->names('register');