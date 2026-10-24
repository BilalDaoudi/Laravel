<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\DeviseController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('home');
});
Route::post('/devise/update_verrouiller', [DeviseController::class, 'updateVerrouiller'])->name('Devise.update_verrouiller');
Route::get('/Devise', [DeviseController::class, 'index'])->name('Devise.index');
Route::post('/Devise', [DeviseController::class, 'add'])->name('Devise.add');
Route::delete('/Devise', [DeviseController::class, 'delete'])->name('Devise.delete');
Route::put('/Devise', [DeviseController::class, 'update'])->name('Devise.update');
Route::get('/Devise/search/{Devise?}',[DeviseController::class,"search"])->name("Devise.search");

Route::get('/clients', [ClientController::class, 'index'])->name('clients.index');
Route::post('/clients', [ClientController::class, 'add'])->name('clients.add');
Route::delete('/clients', [ClientController::class, 'delete'])->name('clients.delete');
Route::put('/clients', [ClientController::class, 'update'])->name('clients.update');
Route::post('/clients/password', [ClientController::class, 'update_password'])->name('clients.update_password');
Route::post('/clients/verrouiller', [ClientController::class, 'update_verrouiller'])->name('clients.update_verrouiller');
Route::get('/clients/search/{client?}',[ClientController::class,"search"])->name("clients.search");
Route::get('/clients/export/pdf',[ClientController::class,"exportpdf"])->name("clients.exportpdf");

