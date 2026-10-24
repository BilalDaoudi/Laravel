<?php

use App\Http\Controllers\DestinataireController;
use App\Http\Controllers\EnvoyerMessageController;
use App\Http\Controllers\MessageController;
use Illuminate\Http\Request;
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
    return view('dashboard');
})->name("dashbord");


Route::get('/Destinataires', [DestinataireController::class, "index"])->name("destinataires");
Route::post('/Destinataires',[DestinataireController::class,"add"])->name("destinataire.add");
Route::delete('/Destinataires/{id}',[DestinataireController::class,"delete"])->name("destinataire.delete");
Route::get('/Destinataires/edit/{id}',[DestinataireController::class,"edit"])->name("destinataire.edit");
Route::put('/Destinataires/{id}',[DestinataireController::class,"update"])->name("destinataire.update");
Route::get('/Destinataires/search/{destinataire?}',[DestinataireController::class,"search"])->name("destinataire.search");
Route::post('/Destinataires/import',[DestinataireController::class,"import"])->name("destinataire.import");

Route::get('/Messages', [MessageController::class, "index"])->name("messages");
Route::post('/Messages',[MessageController::class,"add"])->name("message.add");
Route::delete('/Messages/{id}',[MessageController::class,"delete"])->name("message.delete");
Route::get('/Messages/search/{message?}',[MessageController::class,"search"])->name("message.search");


Route::get('/EnvoyerMessage', [EnvoyerMessageController::class, "index"])->name("EnvoyerMessage");
Route::post('/EnvoyerMessage', [EnvoyerMessageController::class, "envoyer"])->name("EnvoyerMessage.envoyer");






