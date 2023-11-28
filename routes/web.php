<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;


Route::group(['prefix' => 'produto'], function() {
    Route::get('/', [ProdutoController::class,'index']);
    Route::get('/salvar_produto', [ProdutoController::class,'adiciona_carrinho']);
    Route::post('/filtrar/{tipoFiltro}', [ProdutoController::class,'filtra_produtos']);
    Route::get('/finaliza-compra', [ProdutoController::class,'finaliza_compra']);
    Route::get('/carrinho', [ProdutoController::class,'carrinho']);
});

Route::get('/', function () {
  return 'Hello World';
});