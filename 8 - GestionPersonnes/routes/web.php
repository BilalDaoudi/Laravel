<?php

use App\Http\Controllers\PersonneController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Home');
});

Route::controller(PersonneController::class)->group(
    function(){
        Route::get('/Personnes','GetAll')->name("page.personnes");
        Route::get('/Personnes/Add','PageAdd')->name("page.add");
        Route::get('/Personnes/Update/{id}','PageUpdate')->name("page.update");
        Route::post('/Personnes','AddPersonne')->name("add");
        Route::put('/Personnes','UpdatePersonne')->name('update');
        Route::delete('/Personnes/{cin}','DeletePersonne')->name("delete");
    }
);