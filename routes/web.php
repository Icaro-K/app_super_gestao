<?php

use App\Http\Controllers\ContatoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SobreNosController;

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

Route::get("/", [HomeController::class,"home"])->name('site.index');

Route::get('/sobre-nos', [SobreNosController::class,'sobrenos'])->name('site.sobrenos');

Route::get('/contato', [ContatoController::class, 'contato'])->name('site.contato');

Route::get('/login', function(){
    return('login');
})->name('site.login');



Route::prefix('/app')->group(function(){
    
    Route::get('/clientes', function(){
        return('clientes');
    })->name('app.clientes');
    
    Route::get('/fornecedores', function(){
        return('fornecedores');
    })->name('app.fornecedores');
    
    Route::get('/produtos', function(){
        return('produtos');
    })->name('app.produtos');
});

Route::get('/rota1', function(){
    echo 'rota1';
})->name('site.rota1');

Route::get('/rota2', function(){
    return redirect()->route('site.rota1');
})->name('site.rota2');


// Route::redirect('/rota2', '/rota1');