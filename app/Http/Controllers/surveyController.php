<?php

namespace App\Http\Controllers;

use App\Http\Requests\editSurveys;
use App\Models\Form;
use App\Models\User;
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
        $form = Form::create($request->only([
            'form_type',
            'survey_type',
            'status',
            'title',
            'indications',
            'effective_date',
        ]));

        $questions = $request->input('questions', []);
        $answers = $request->input('answers', []);

        foreach ($questions as $key => $question) {
            $newQuestion = $form->surveys()->create([
                'question' => $question,
            ]);

            if (isset($answers[$key])) {
                foreach ($answers[$key] as $answer) {
                    $newQuestion->responses()->create([
                        'answer' => $answer,
                    ]);
                }
            }
        }

        return redirect()->route('survey.index');
    }

    public function edit(Form $survey)
    {
        // $users = User::all();
        return view('surveys.edit', compact('survey'));
    }


    public function update(editSurveys $request, Form $survey)
    {
        // dd($request->all());
        // Actualiza los detalles generales del formulario
        $survey->update($request->only([
            'form_type',
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
                foreach ($answers[$key] as $answer) {
                    $newQuestion->responses()->create([
                        'answer' => $answer,
                    ]);
                }
            }
        }

        return redirect()->route('survey.index');
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
