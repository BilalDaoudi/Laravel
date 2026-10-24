<?php

use App\Http\Controllers\CategorieController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\LigneCommandeDemoController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\UserController;

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
    return view('welcome');
})->name("home");


Route::resource('categories', CategorieController::class)->parameters(['categories' => 'categorie']);

Route::resource('produits', ProduitController::class);
Route::get('/acheter/{categorie?}', [ProduitController::class, 'acheter'])->name('produits.acheter');


Route::get('/commandes', [CommandeController::class, 'index'])->name('commandes.index');
Route::post('/commandes', [CommandeController::class, 'store'])->name('commandes.store');
Route::get('/commandes/{id}', [CommandeController::class, 'show'])->name('commandes.show');
Route::delete('/commandes/{id}', [CommandeController::class, 'destroy'])->name('commandes.destroy');
Route::post('/commandes/{id}/valider', [CommandeController::class, 'valider'])->name('commandes.valider');
Route::post('/commandes/{id}/annuler', [CommandeController::class, 'annuler'])->name('commandes.annuler');
Route::get('/mescommandes', [CommandeController::class, 'mescommandes'])->name('commandes.mescommandes');

Route::get('/LigneCommandeDemo', [LigneCommandeDemoController::class, 'index'])->name('LigneCommandeDemo.index');
Route::post('/LigneCommandeDemo', [LigneCommandeDemoController::class, 'store'])->name('LigneCommandeDemo.store');
Route::delete('/LigneCommandeDemo/{id}', [LigneCommandeDemoController::class, 'destroy'])->name('LigneCommandeDemo.destroy');

Route::get('/login', [LoginController::class, 'show'])->name('login.show');
Route::get('/logout', [LoginController::class, 'logout'])->name('login.logout');
Route::post('/login', [LoginController::class, 'login'])->name('login.login');

Route::get('/inscription', [UserController::class, 'create'])->name('users.create');
Route::post('/inscription', [UserController::class, 'store'])->name('users.store');
Route::get('/utilisateurs', [UserController::class, 'index'])->name('users.index');
Route::delete('/utilisateurs/{user}', [UserController::class, 'destroy'])->name('users.destroy');
