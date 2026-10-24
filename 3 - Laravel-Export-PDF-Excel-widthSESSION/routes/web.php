<?php
use App\Http\Controllers\actionComptable;
use App\Http\Controllers\ConvertsController;
use App\Http\Controllers\dashbordControoler;
use App\Http\Controllers\DeposeController;
use App\Http\Controllers\EntrepriseController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\profileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DeviseController;
use App\Http\Controllers\OperationController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\TransfertController;
use Illuminate\Support\Facades\Route;



Route::get('/', [ClientController::class, 'index'])->name('clients.index');



Route::get('/get-base-devise/{symbol}', [DeviseController::class, 'getBaseDevise']);
Route::post('/update-base-devise', [DeviseController::class, 'updateBaseDevise']);
Route::put('/entreprise/{titre}', [EntrepriseController::class, 'update']);


Route::get('/Devise', [DeviseController::class, 'index'])->name('devise.index');
Route::post('/Devise', [DeviseController::class, 'add'])->name('devise.add');
Route::delete('/Devise', [DeviseController::class, 'delete'])->name('devise.delete');
Route::put('/Devise', [DeviseController::class, 'update'])->name('devise.update');
Route::get('/Devise/search/{devise?}',[DeviseController::class,"search"])->name("devise.search");


Route::get('/clients', [ClientController::class, 'index'])->name('clients.index');
Route::post('/clients', [ClientController::class, 'add'])->name('clients.add');
Route::delete('/clients', [ClientController::class, 'delete'])->name('clients.delete');
Route::put('/clients', [ClientController::class, 'update'])->name('clients.update');
Route::post('/clients/password', [ClientController::class, 'update_password'])->name('clients.update_password');
Route::post('/clients/verrouiller', [ClientController::class, 'update_verrouiller'])->name('clients.update_verrouiller');
Route::get('/clients/search/{client?}',[ClientController::class,"search"])->name("clients.search");
Route::post('/clients/operation', [ClientController::class, 'operation'])->name('clients.operation');


Route::get('/comptables', [UserController::class, 'index'])->name('comptables.index');
Route::post('/comptables', [UserController::class, 'add'])->name('comptables.add');
Route::delete('/comptables', [UserController::class, 'delete'])->name('comptables.delete');
Route::put('/comptables', [UserController::class, 'update'])->name('comptables.update');
Route::post('/comptables/password', [UserController::class, 'update_password'])->name('comptables.update_password');
Route::post('/comptables/verrouiller', [UserController::class, 'update_verrouiller'])->name('comptables.update_verrouiller');
Route::get('/users/permissionclients/{userId}', [UserController::class, 'permission_clients'])->name('users.permissionclients');
Route::post('/users/permissionclients', [UserController::class, 'add_permission_clients'])->name('users.addpermissionclients');

Route::get('/login', [UserController::class, 'connexion'])->name('login');
Route::post('/login', [UserController::class, 'login'])->name('connexion');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');


Route::get('/operations/{client}/{devise}', [OperationController::class, 'index'])->name('operation.index');
Route::post('/operations', [OperationController::class, 'add'])->name('operation.add');
Route::delete('/operations', [OperationController::class, 'delete'])->name('operation.delete');
Route::put('/operations', [OperationController::class, 'update'])->name('operation.update');


Route::get('/transferts/{client}/{devise}', [TransfertController::class, 'index'])->name('transfert.index');
Route::post('/transferts', [TransfertController::class, 'add'])->name('transfert.add');
Route::delete('/transferts', [TransfertController::class, 'delete'])->name('transfert.delete');
Route::put('/transferts', [TransfertController::class, 'update'])->name('transfert.update');


Route::get("/converts/{client}/{devise}",[ConvertsController::class,"index"])->name("converts.index");
Route::post("/converts",[ConvertsController::class,"add"])->name("converts.add");
Route::put("/converts",[ConvertsController::class,"update"])->name("converts.update");
Route::delete("/converts",[ConvertsController::class,"delete"])->name("converts.delete");

Route::get("/profile",[profileController::class,"index"])->name("profile.index");
Route::put("/profile",[profileController::class,"update"])->name("profile.update");

Route::get("/profile/user",[profileController::class,"userIndex"])->name("profile.userIndex");
Route::put("/profile/user",[profileController::class,"userUpdate"])->name("profile.userUpdate");
Route::put("/profile/user/updatePassword",[profileController::class,"update_password"])->name("profile.update_password");

Route::get("/deposes/{client}/{devise}",[DeposeController::class,"index"])->name("deposes.index");
Route::post("/deposes",[DeposeController::class,"add"])->name("deposes.add");
Route::put("/deposes",[DeposeController::class,"update"])->name("deposes.update");
Route::delete("/deposes",[DeposeController::class,"delete"])->name("deposes.delete");

Route::get('/404', function () {
    return view('404');
})->name('404');


// Route::get("/dashbord",[dashbordControoler::class,"index"])->name("dashbord.index");
// Route::get("/actionComptable",[actionComptable::class,"index"])->name("actionComptable.index");


Route::get('/export', [ClientController::class, 'export']);
Route::get('/pdf', [PDFController::class, 'exportPDF']);