<?php

use App\Http\Controllers\EmailController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\surveyController;
use App\Mail\surveyMailable;
use Illuminate\Support\Facades\Mail;

// Route::controller(surveyController::class)->group(function () {

//     Route::get('/', 'index')->name('survey.index');

//     Route::get('encuestas/crear', 'create')->name('survey.create');

//     Route::post('encuestas', 'store')->name('survey.store');

//     Route::get('encuestas/{survey}', 'show')->name('survey.show');

//     Route::get('encuestas/{survey}/editar', 'edit')->name('survey.edit');

//     Route::put('encuestas/{survey}', 'update')->name('survey.update');

//     Route::delete('encuestas/{survey}', 'destroy')->name('survey.destroy');

//     //prueba de progreso
//     Route::get('encuestas/progresos/encuestas', 'progreso')->name('survey.progreso');
// });


// Ruta para el método index
Route::get('/', [surveyController::class, 'index']);

//metodos post,get,update y destroy
Route::resource('encuestas', surveyController::class)
    ->parameters(['encuestas' => 'survey'])
    ->names('survey');

//progreso
Route::get('encuestas/progresos/encuestas', [surveyController::class, 'progreso'])->name('survey.progreso');


//mandar encuesta a los usuarios
// Route::get('send', function () {
   
//     Mail::to('diosdelaguerra.satm@gmail.com')->send(new surveyMailable);

//     return "Encuesta enviada";
// })->name('survey.send');

Route::get('responder',[EmailController::class, 'index'])->name('responder.index');

Route::post('responder',[EmailController::class, 'store'])->name('responder.store');
