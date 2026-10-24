<?php

use App\Http\Controllers\TodoListController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
});


Route::get('/login', [UserController::class, 'showLoginForm'])->name('login');
Route::post('/login', [UserController::class, 'login']);
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

Route::get('/register', [UserController::class, 'showInscriptionForm']);
Route::post('/register', [UserController::class, 'register']);
Route::get('/todolist/{date?}', [TodoListController::class, 'index'])->name('todolist');

Route::post('/todolist', [TodoListController::class, 'store'])->name('add');
Route::delete('/todolist{id}', [TodoListController::class, 'delete'])->name('delete');
Route::put('/todolist/valider/{id}', [TodoListController::class, 'valider'])->name('valider');
Route::put('/todolist/play/{id}', [TodoListController::class, 'play'])->name('play');