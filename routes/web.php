<?php

use Illuminate\Support\Facades\Route;

Route::prefix('clientes')->group(function () {
    Route::get('/', ClientesIndex::class)->name('clientes.index');
    Route::get('/create', ClientesCreate::class)->name('clientes.create');
    Route::get('/{cliente}', ClientesShow::class)->name('clientes.show');
    Route::get('/{cliente}/edit', ClientesEdit::class)->name('clientes.edit');
});

Route::prefix('produtos')->group(function () {
    Route::get('/', ProdutosIndex::class)->name('produtos.index');
    Route::get('/create', ProdutosCreate::class)->name('produtos.create');
    Route::get('/{produto}', ProdutosShow::class)->name('produtos.show');
    Route::get('/{produto}/edit', ProdutosEdit::class)->name('produtos.edit');
});