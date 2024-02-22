<?php

use App\Http\Controllers\EmailController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\surveyController;
use App\Mail\surveyMailable;
use Illuminate\Support\Facades\Mail;

// Ruta para el método index
Route::get('/', [surveyController::class, 'index']);

//metodos post,get,update y destroy de encuestas 
Route::resource('encuestas', surveyController::class)
    ->parameters(['encuestas' => 'survey'])
    ->names('survey');


//metodos post,get,update y destroy de emials
Route::resource('email',EmailController::class)->names('email');

Route::get('/survey/form/{user_id}/{form_id}', 'SurveyController@showForm')->name('survey.form');


//progreso
Route::post('/encuestas/store', [surveyController::class, 'progreso'])->name('survey.progreso');
