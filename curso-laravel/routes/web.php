<?php

use App\Http\Controllers\CarrinhoController;
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