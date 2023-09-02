<?php

// use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\Homecontroller;
use App\Http\Controllers\surveyController;

Route::controller(surveyController  ::class)->group(function () {

    Route::get('/', 'index')->name('survey.index');

    Route::get('encuestas/crear', 'create')->name('survey.create');

    Route::post('encuestas','surveys')->name('survey.surveys');

    Route::get('encuestas/{survey}', 'show')->name('survey.show');

    Route::get('encuestas/{survey}/edit', 'edit')->name('survey.edit');

    Route::put('encuestas/{survey}', 'update')->name('survey.update');
});

