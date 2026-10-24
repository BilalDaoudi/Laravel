<?php

use App\Http\Controllers\CategorieController;
use App\Http\Controllers\CommandeProduitController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\panierController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\UtilisateurController;
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

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

Route::post('/login', [LoginController::class, 'login'])->name('login.post');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::group(['middleware' => 'VerifySession'], function () {
    Route::redirect('/', '/produits');

    Route::get('utilisateurs/create', [UtilisateurController::class, 'create'])->name('utilisateurs.create');
    Route::post('utilisateurs', [UtilisateurController::class, 'store'])->name('users.store');



    // Logout route

    Route::get('produits', [ProduitController::class, 'index'])->name('produits.index');





    Route::post('commandes', [CommandeProduitController::class, 'store'])->name('commandes.store');
    Route::delete('commandes/{commande}', [CommandeProduitController::class, 'destroy'])->name('commandes.destroy');
    Route::get('commandes/{commande}', [CommandeProduitController::class, 'show'])->name('commandes.show');



    Route::get('/products', [ProduitController::class, 'index'])->name('produits.index');

    // Login routes



    Route::post('/panier/add/{id}', [panierController::class, 'add'])->name('panier.add');
    Route::get('/panier', [panierController::class, 'show'])->name('panier.show');
    Route::patch('/panier/decrease/{productId}', [PanierController::class, 'decrease'])->name('panier.decrease');
});
//admin access
Route::middleware(['VerifySession', 'admin'])->group(function () {
    Route::get('utilisateurs', [UtilisateurController::class, 'index'])->name('utilisateurs.index');
    Route::get('utilisateurs/{utilisateur}/edit', [UtilisateurController::class, 'edit'])->name('utilisateurs.edit');
    Route::put('utilisateurs/{utilisateur}', [UtilisateurController::class, 'update'])->name('utilisateurs.update');
    Route::delete('utilisateurs/{utilisateur}', [UtilisateurController::class, 'destroy'])->name('utilisateurs.destroy');
    Route::get('produits/create', [ProduitController::class, 'create'])->name('produits.create');
    Route::post('produits', [ProduitController::class, 'store'])->name('produits.store');
    Route::get('produits/{produit}/edit', [ProduitController::class, 'edit'])->name('produits.edit');
    Route::put('produits/{produit}', [ProduitController::class, 'update'])->name('produits.update');
    Route::delete('produits/{produit}', [ProduitController::class, 'destroy'])->name('produits.destroy');
    Route::get('categories', [CategorieController::class, 'index'])->name('categories.index');
    Route::get('categories/create', [CategorieController::class, 'create'])->name('categories.create');
    Route::post('categories', [CategorieController::class, 'store'])->name('categories.store');
    Route::get('categories/{categorie}/edit', [CategorieController::class, 'edit'])->name('categories.edit');
    Route::put('categories/{categorie}', [CategorieController::class, 'update'])->name('categories.update');
    Route::delete('categories/{categorie}', [CategorieController::class, 'destroy'])->name('categories.destroy');
    Route::get('commandes', [CommandeProduitController::class, 'index'])->name('commandes.index');
});
