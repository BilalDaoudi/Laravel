<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\LoginController;
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

// Route::get('/', function () {
//     return view('dashboard');
// })->name("dashbord");
// Route::get('/login',[LoginController::class,"index"])->name("login.index");
// Route::post('/login',[LoginController::class,"login"])->name("login.login");


Route::get('/', [ClientController::class, "index"])->name("client.index");
Route::get('/Clients/search/{client?}',[ClientController::class,"search"])->name("client.search");
Route::post('/Clients', [ClientController::class, "store"])->name("client.store");
Route::get('/Clients/Ajoute', [ClientController::class, "create"])->name("client.create");
Route::put('/Clients/{client}', [ClientController::class, "update"])->name("client.update");
Route::get('/Clients/{client}', [ClientController::class, "edit"])->name("client.edit");
Route::delete('/Clients/{client}', [ClientController::class, "destroy"])->name("client.destroy");
Route::get('/ArchiveClients', [ClientController::class, "archive"])->name("client.archive");
Route::get('/ArchiveClients/search/{client?}',[ClientController::class,"searcharchive"])->name("client.searcharchive");
Route::delete('/ArchiveClients/{client}', [ClientController::class, "forcedelete"])->name("client.forcedelete");
Route::post('/ArchiveClients/{client}', [ClientController::class, "restore"])->name("client.restore");









// Route::put('/Clients/{client}',function(Request $req, $id){
//     dd($req,$id);
// })->name("client.update");