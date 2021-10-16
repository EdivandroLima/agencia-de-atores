<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AssistenteController;
use App\Http\Controllers\ProdutorController;
use App\Http\Controllers\AtorController;
use App\Http\Controllers\Auth\ChangePasswordController;

Route::get('/', function () {
    if (empty(\App\Models\User::first()))
        // Vai para a view de registro caso não tenha úsuario cadastrado
        return redirect()->route('register');
    if (Auth::check()) {
        return view('index');
    } else {
        return redirect()->route('login');
    }
});

Route::get('/home', function () {
    return redirect('/');
})->name('home');

Auth::routes();
Route::put('/modificar-senha', [ChangePasswordController::class, 'update']);
// Assistentes
Route::get('/assistentes', [AssistenteController::class, 'all']);
Route::post('/assistente', [AssistenteController::class, 'create']);
Route::delete('/assistente/{user}', [AssistenteController::class, 'delete']);
// Produtores
Route::post('/produtores/enviar-email', [ProdutorController::class, 'enviarArtistasParaProdutores']);
Route::get('/produtores', [ProdutorController::class, 'index']);
Route::post('/produtores', [ProdutorController::class, 'store']);
Route::put('/produtores/{produtor}', [ProdutorController::class, 'update']);
Route::delete('/produtores/{produtor}', [ProdutorController::class, 'destroy']);
// Atores
Route::get('/atores', [AtorController::class, 'index']);
Route::post('/atores', [AtorController::class, 'store']);
