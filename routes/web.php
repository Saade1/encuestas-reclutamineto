<?php

use App\Http\Controllers\EmailController;
use App\Http\Controllers\FormController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\surveyController;


// Ruta para el método index
Route::get('/', [surveyController::class, 'index']);

//metodos post,get,update y destroy de encuestas 
Route::resource('encuestas', surveyController::class)
    ->parameters(['encuestas' => 'survey'])
    ->names('survey');


//metodos post,get,update y destroy de emials
Route::resource('email', EmailController::class)->names('email');

// Route::get('/survey/form/{user_id}/{form_id}', 'SurveyController@showForm')->name('survey.form');

Route::get('/survey/form/{user_id}/{form_id}', [FormController::class, 'showForm'])->name('survey.form');

Route::post('/survey/submit/{user_id}/{form_id}', [FormController::class, 'submit'])->name('survey.submit');

//progreso
Route::post('/encuestas/store', [surveyController::class, 'progreso'])->name('survey.progreso');
