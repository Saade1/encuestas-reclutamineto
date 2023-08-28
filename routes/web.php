<?php

// use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Homecontroller;
use App\Http\Controllers\encuestaController;

Route::get('/', Homecontroller::class);

// Route::get('encuestas',[encuestaController::class,'index'])->name('encuestas.index');

Route::controller(encuestaController::class)->group(function () {

    Route::get('encuestas', 'index')->name('survey.index');

    Route::get('encuestas/crear', 'create')->name('survey.create');

    Route::get('/encuestas/{encuesta}', 'show')->name('survey.show');
});

// Route::get('encuestas/{encuesta}/{categoria?}', function ($encuesta, $categoria = null) {
//     if ($categoria) {
//         return "Encuesta $encuesta, en la categoria $categoria";
//     } else {
//         return "Encuesta :$encuesta";
//     }
// });
