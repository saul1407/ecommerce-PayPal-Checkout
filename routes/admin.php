<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\CategoriasController;
use App\Http\Controllers\Admin\SubCategoriaController;


Route::resource('/', HomeController::class)->names('admin.home');

Route::resource('categorias', CategoriasController::class)->names('admin.categorias');

Route::resource('sub-categorias', CategoriasController::class)->names('admin.sub-categorias');