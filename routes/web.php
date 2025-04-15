<?php

use App\Livewire\Produto\ProdutoCreate;
use App\Livewire\Produto\ProdutoEdit;
use App\Livewire\Produto\ProdutoIndex;
use App\Livewire\Produto\ProdutoShow;
use App\Livewire\Produtos\Create;
use App\Livewire\Produtos\Edit;
use App\Livewire\Produtos\Index;
use App\Models\Produto;
use Illuminate\Support\Facades\Route;

Route::prefix('produtos')->group(function () {
    Route::get('/', ProdutoIndex::class)->name('produto.index');
    Route::get('/create', ProdutoCreate::class)->name('produtos.create');
    Route::get('/{produto}', ProdutoShow::class)->name('produtos.show');
    Route::get('/{produto}/edit', ProdutoEdit::class)->name('produtos.edit');
});

Route::prefix('clientes')->group(function () {
    Route::get('/', \App\Livewire\Clientes\ClienteIndex::class)->name('clientes.index');
    Route::get('/create', \App\Livewire\Clientes\ClienteCreate::class)->name('clientes.create');
    Route::get('/{cliente}', \App\Livewire\Clientes\ClienteShow::class)->name('clientes.show');
    Route::get('/{cliente}/edit', \App\Livewire\Clientes\ClienteEdit::class)->name('clientes.edit');
});