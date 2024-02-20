<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\log\RegAuth;
use App\Http\Controllers\log\LoginAuth;
use App\Http\Controllers\PokemonController;
use App\Http\Controllers\UsersController;

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

//Ruta principal
Route::get('/', function () {
    return view('log.login');
});

//Ruta log
Route::view('/log','log.login')->name('verLog');
Route::post('/log/logged', [LoginAuth::class, 'login'])->name('logged');
Route::get('/log/logout', [LoginAuth::class, 'logout'])->name('logout');


//Ruta reg
Route::view('/reg','log.register')->name('verReg');
Route::post('/reg/register', [RegAuth::class, 'register'])->name('register');


//Ruta home
Route::view('/home','home')->name('verHome');

//Ruta Pokemons
Route::view('/pokemons','Tienda.pokemons');
Route::get('/pokemons',[PokemonController::class, 'index'])->name('verPokemons');
Route::get('/pokemons/{id}',[PokemonController::class, 'edit'])->name('editarPokemon');
Route::post('/pokemons/storePokemon',[PokemonController::class, 'store'])->name('storePokemon');
Route::delete('/pokemons',[PokemonController::class, 'destroy'])->name('destroyPokemon');
Route::get('/pokemons/edit/{id}', [PokemonController::class, 'edit'])->name('editPokemon');
Route::post('/pokemons/update', [PokemonController::class, 'update'])->name('updatePokemon');

//Ruta Users
Route::view('/users','Users.users');
Route::get('/users',[UsersController::class, 'index'])->name('verUsers');
Route::get('/users/{id}',[UsersController::class, 'edit'])->name('editarUser');
Route::post('/users/storeUser',[UsersController::class, 'store'])->name('storeUser');
Route::delete('/users',[UsersController::class, 'destroy'])->name('destroyUser');
Route::get('/users/edit/{id}', [UsersController::class, 'edit'])->name('editUser');
Route::post('/users/update', [UsersController::class, 'update'])->name('updateUser');



