<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EncuestaController extends Controller
{
    public function index(){
        return "Bienvenido a las encuestas";
    }
    public function create(){
        return "Crear encuestas";
    }

    public function show($encuesta){
        return "Encuesta :$encuesta";
    }
}
