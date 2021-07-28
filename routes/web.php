<?php

use App\Http\Controllers\PessoaController;
use App\Http\Controllers\ProfissaoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('profissoes.index');
});

Route::prefix('pessoas')->name('pessoas.')->group(function () {
    Route::get('', [PessoaController::class, 'index'])->name('index');
    Route::post('', [PessoaController::class, 'store'])->name('store');
    Route::get('{pessoa}/edita', [PessoaController::class, 'edit'])->name('edit');
    Route::put('{pessoa}', [PessoaController::class, 'update'])->name('update');
    Route::delete('{pessoa}', [PessoaController::class, 'destroy'])->name('destroy');
});

Route::prefix('profissoes')->name('profissoes.')->group(function () {
    Route::get('', [ProfissaoController::class, 'index'])->name('index');
    Route::post('', [ProfissaoController::class, 'store'])->name('store');
    Route::get('{profissao}/edita', [ProfissaoController::class, 'edit'])->name('edit');
    Route::put('{profissao}', [ProfissaoController::class, 'update'])->name('update');
    Route::delete('{profissao}', [ProfissaoController::class, 'destroy'])->name('destroy');
});
