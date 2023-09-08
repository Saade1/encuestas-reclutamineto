<?php

namespace App\Http\Controllers;

use App\Models\Survey;
use Illuminate\Http\Request;
use App\Http\Requests\SurveysSurvey;

class surveyController extends Controller
{
    public function index()
    {

        $survey = Survey::orderBy('id', 'desc')->paginate();

        return view('surveys.index', compact('survey'));
    }
    public function create()
    {
        return view('surveys.create');
    }

    public function surveys(SurveysSurvey $request)
    {
        $survey = Survey::create($request->all());

        return redirect()->route('survey.index', $survey);
    }

    public function show(Survey $survey)
    {

        return view('surveys.show', compact('survey'));
    }

    public function edit(Survey $survey)
    {

        return view('surveys.edit', compact('survey'));
    }

    public function update(SurveysSurvey $request, Survey $survey)
    {

        $survey->update($request->all());

        return redirect()->route('survey.index', $survey);
    }
}
