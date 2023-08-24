<?php

// use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Homecontroller;
use App\Http\Controllers\encuestaController;

Route::get('/', Homecontroller::class);

Route::get('encuestas',[EncuestaController::class,'index']);

Route::get('encuestas/create', [EncuestaController::class,'create']);

Route::get ('/encuestas/{encuesta}',[EncuestaController::class,'show']);

// Route::get('encuestas/{encuesta}/{categoria?}', function ($encuesta, $categoria = null) {
//     if ($categoria) {
//         return "Encuesta $encuesta, en la categoria $categoria";
//     } else {
//         return "Encuesta :$encuesta";
//     }
// });
