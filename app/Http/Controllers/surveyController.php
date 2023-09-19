<?php

namespace App\Http\Controllers;

use App\Models\Form;
use App\Http\Requests\SurveysSurvey;

class SurveyController extends Controller
{
    public function index()
    {

        $survey = Form::orderBy('id', 'desc')->paginate();

        return view('surveys.index', compact('survey'));
    }
    public function create()
    {
        return view('surveys.create');
    }

    public function store(SurveysSurvey $request)
    {
        // $survey = Form::create($request->all());

        // return redirect()->route('survey.index', $survey);

         // Crea el formulario
    $form = Form::create($request->only([
        'question_type',
        'survey_type',
        'status',
        'title',
        'indications',
        'effective_date',
    ]));

    // Obtiene las preguntas y respuestas del formulario
    $questions = $request->input('questions', []);
    $answers = $request->input('answers', []);

    // Asocia cada pregunta y respuesta al formulario
    foreach ($questions as $key => $question) {
        $form->surveys()->create([
            'question' => $question,
            'answer' => $answers[$key],
        ]);
    }

    return redirect()->route('survey.index', $form);
    }

    public function show(Form $survey)
    {

        return view('surveys.show', compact('survey'));
    }

    public function edit(Form $survey)
    {

        return view('surveys.edit', compact('survey'));
    }

    // public function update(SurveysSurvey $request, Form $survey)
    // {

    //     $survey->update($request->all());

    //     return redirect()->route('survey.index', $survey);
    // }

    public function update(SurveysSurvey $request, Form $survey)
{
    // Actualiza los detalles generales del formulario
    $survey->update($request->only([
        'question_type',
        'survey_type',
        'status',
        'title',
        'indications',
        'effective_date',
    ]));

    // Obtiene las preguntas y respuestas del formulario desde la solicitud
    $questions = $request->input('questions', []);
    $answers = $request->input('answers', []);

    // Borra todas las preguntas existentes relacionadas con el formulario
    $survey->surveys()->delete();

    // Crea y asocia las nuevas preguntas y respuestas al formulario
    foreach ($questions as $key => $question) {
        $survey->surveys()->create([
            'question' => $question,
            'answer' => $answers[$key],
        ]);
    }

    return redirect()->route('survey.index', $survey);
}

    public function destroy(Form $survey){
        $survey->delete();
        return redirect()->route('survey.index');
    }

    public function progreso()
    {

        return view('surveys.progreso');
    }

}
