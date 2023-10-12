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
    // dd($request->all());
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
    $answers = $request->input('answers', []); // Asegúrate de que los nombres de los campos coincidan con los del formulario

    // Asocia cada pregunta y respuesta al formulario
    foreach ($questions as $key => $question) {
        $newQuestion = $form->surveys()->create([
            'question' => $question,
        ]);

        // Asocia respuestas con la pregunta
        if (isset($answers[$key])) {
            foreach ($answers[$key] as $answerText) {
                $newQuestion->responses()->create([
                    'answer' => $answerText,
                ]);
            }
        }
    }

    return redirect()->route('survey.index')->with('success', 'Encuesta creada correctamente');
}


    public function show(Form $survey)
    {

        return view('surveys.show', compact('survey'));
    }

    public function edit(Form $survey)
    {

        return view('surveys.edit', compact('survey'));
    }

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

    // Borra todas las preguntas existentes relacionadas con el formulario
    $survey->surveys()->delete();

    // Obtiene las preguntas y respuestas del formulario desde la solicitud
    $questions = $request->input('questions', []);
    $answers = $request->input('answers', []);

    // Asocia las nuevas preguntas y respuestas al formulario
    foreach ($questions as $key => $question) {
        $newQuestion = $survey->surveys()->create([
            'question' => $question,
        ]);

        // Asocia respuestas con la pregunta
        if (isset($answers[$key])) {
            foreach ($answers[$key] as $answerText) {
                $newQuestion->responses()->create([
                    'answer' => $answerText,
                ]);
            }
        }
    }

    return redirect()->route('survey.index')->with('success', 'Encuesta actualizada correctamente');
}

    public function destroy(Form $survey)
    {
        $survey->delete();
        return redirect()->route('survey.index');
    }

    public function progreso()
    {

        return view('surveys.progreso');
    }
}
