<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;


Route::resource('/', HomeController::class)->names('admin.home');