<?php

use App\Http\Controllers\ProdutosController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home.inicio');
})-> name('home-inicio');


Route::prefix('produtos')->group(function(){
    //view.blade.php
    Route::get('/',[ProdutosController::class, 'view'])-> name('produtos-view'); 
    //cadastro_produtos.blade.php
    Route::get('/cadastro',[ProdutosController::class, 'cadastrar_produtos'])-> name('produtos-cadastro');
    Route::post('/',[ProdutosController::class, 'salvar_produtos'])-> name('salvar-produtos');
    //editar_produtos.blade.php
    Route::get('/{id}/editar',[ProdutosController::class, 'editar_produtos']) -> where('id', '[0-9]+') -> name('editar-produtos');
    Route::put('/{id}',[ProdutosController::class, 'atualizar_produtos']) -> where('id', '[0-9]+') -> name('atualizar-produtos');
    Route::delete('/{id}',[ProdutosController::class, 'excluir_produtos']) -> where('id', '[0-9]+') -> name('excluir-produtos');
    Route::get('/busca',[ProdutosController::class, 'buscar_produtos'])-> name('buscar-produtos');

    
    
});


Route::fallback(function(){
    return "Rota não encontrada!";
});