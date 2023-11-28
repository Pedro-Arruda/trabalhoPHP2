<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;


Route::group(['prefix' => 'produto'], function() {
    Route::get('/', [ProdutoController::class,'index']);
    Route::get('/salvar_produto', [ProdutoController::class,'adiciona_carrinho']);
    Route::get('/filtrar/{filtro}/{tipoFiltro}', [ProdutoController::class,'filtra_produtos']);
});
