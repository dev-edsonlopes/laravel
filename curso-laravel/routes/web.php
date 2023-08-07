<?php

use Illuminate\Support\Facades\Route;
use App\Models\Produto;
use App\Http\Controllers\SiteController;

Route::resource('produtos', Produto::class);
Route::get('/', [SiteController::class, 'index'])->name('layout.site');

Route::get('/produto/{slug}', [SiteController::class, 'details'])->name('layout.details');