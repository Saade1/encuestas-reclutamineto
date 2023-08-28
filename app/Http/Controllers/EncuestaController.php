<?php

namespace App\Http\Controllers;

use App\Models\Survey;
use Illuminate\Http\Request;

class EncuestaController extends Controller
{
    public function index()
    {

        $survey = Survey::paginate ();

        return view('surveys.index',compact('survey'));
    }
    public function create()
    {
        return view('surveys.create');
    }

    public function show($encuesta)
    {
        return view('surveys.show', compact('encuesta'));
    }
}
