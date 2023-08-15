<?php

use App\Http\Controllers\CarrinhoController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Models\Produto;
use App\Http\Controllers\SiteController;

Route::resource('produtos', Produto::class);

Route::get('/', [SiteController::class, 'index'])->name('layout.site');
Route::get('/produto/{slug}', [SiteController::class, 'details'])->name('layout.details');
Route::get('/categoria/{id}', [SiteController::class, 'categoria'])->name('layout.categoria');
Route::get('/carrinho', [CarrinhoController::class, 'carrinhoLista'])->name('layout.carrinho');

Route::post('/carrinho', [CarrinhoController::class, 'adicionarCarrinho'])->name('addCarrinho');
Route::post('/removerCarrinho', [CarrinhoController::class, 'removerCarrinho'])->name('removeCarrinho');
Route::post('/atualizarCarrinho', [CarrinhoController::class, 'atualizarCarrinho'])->name('atualizaCarrinho');
Route::get('/limpar', [CarrinhoController::class, 'limparCarrinho'])->name('limpaCarrinho');

Route::view('/login', 'login.form')->name('login.form');
Route::post('/auth', [LoginController::class, 'auth'])->name('login.auth');
Route::get('/logout', [LoginController::class, 'logout'])->name('login.logout');

Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

