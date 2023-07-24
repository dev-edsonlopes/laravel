<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;

Route::view('/', 'welcome');
Route::resource('produtos', ProdutoController::class);