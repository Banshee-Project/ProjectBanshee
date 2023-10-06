<?php

use App\Http\Controllers\LancamentosController;
use App\Http\Controllers\PessoasController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::prefix('lancamentos')->group(function () {
    Route::get('/', [LancamentosController::class, 'index'])->name('lancamento.index');    
    // Cadastrar
    Route::get('/cadastrarLancamento', [LancamentosController::class, 'cadastrarLancamento'])->name('cadastrar.lancamento');    
    Route::post('/cadastrarLancamento', [LancamentosController::class, 'cadastrarLancamento'])->name('cadastrar.lancamento');    
    // Atualizar
    Route::get('/atualizarLancamento/{id}', [LancamentosController::class, 'atualizarLancamento'])->name('atualizar.lancamento');    
    Route::put('/atualizarLancamento/{id}', [LancamentosController::class, 'atualizarLancamento'])->name('atualizar.lancamento');

    Route::delete('/delete', [LancamentosController::class, 'delete'])->name('lancamento.delete');    
}); 

Route::prefix('pessoas')->group(function () {
    Route::get('/', [PessoasController::class, 'index'])->name('pessoas.index');    
    // Cadastrar
    Route::get('/cadastrarPessoa', [PessoasController::class, 'cadastrarPessoa'])->name('cadastrar.pessoas');    
    Route::post('/cadastrarPessoa', [PessoasController::class, 'cadastrarPessoa'])->name('cadastrar.pessoas');    
    // Atualizar
    Route::get('/atualizarPessoa/{id}', [PessoasController::class, 'atualizarPessoa'])->name('atualizar.pessoas');    
    Route::put('/atualizarPessoa/{id}', [PessoasController::class, 'atualizarPessoa'])->name('atualizar.pessoas');

    Route::delete('/delete', [PessoasController::class, 'delete'])->name('pessoas.delete');    
}); 