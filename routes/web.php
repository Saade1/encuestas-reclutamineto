<?php

use App\Http\Controllers\EmailController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\surveyController;
use App\Mail\surveyMailable;
use Illuminate\Support\Facades\Mail;

// Ruta para el método index
Route::get('/', [surveyController::class, 'index']);

//metodos post,get,update y destroy
Route::resource('encuestas', surveyController::class)
    ->parameters(['encuestas' => 'survey'])
    ->names('survey');

//progreso
Route::post('/encuestas/store', [surveyController::class, 'progreso'])->name('survey.progreso');


//mandar encuesta a los usuarios
// Route::get('send', function () {

//     Mail::to('diosdelaguerra.satm@gmail.com')->send(new surveyMailable);

//     return "Encuesta enviada";
// })->name('survey.send');

Route::get('responder', [EmailController::class, 'index'])->name('responder.index');

Route::post('responder', [EmailController::class, 'store'])->name('responder.store');

// Route::get('/encuestas/{surveyId}/delete-question/{questionId}', [surveyController::class, 'deleteQuestion'])->name('survey.deleteQuestion');
// Route::get('/encuestas/{surveyId}/delete-answer/{questionId}/{answerId}', [surveyController::class, 'deleteAnswer'])->name('survey.deleteAnswer');
