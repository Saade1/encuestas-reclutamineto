<?php

namespace App\Http\Controllers;
use App\Models\Survey;
use Illuminate\Http\Request;

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

    public function surveys(Request $request)
    {
        $request->validate([
            'question_type' => 'required', 'survey_type' => 'required',
            'title' => 'required', 'indications' => 'required', 'created_at' => 'required',
            'updated_at' => 'required', 'effective_date' => 'required'
        ]);

        $survey = new survey();

        $survey->question_type = $request->question_type;
        $survey->survey_type = $request->survey_type;
        $survey->title = $request->title;
        $survey->indications = $request->indications;
        $survey->created_at = $request->created_at;
        $survey->updated_at = $request->updated_at;
        $survey->effective_date = $request->effective_date;

        $survey->save();

        return redirect()->route('survey.index');
    }

    public function show(Survey $survey)
    {

        return view('surveys.show', compact('survey'));
    }
    public function edit(Survey $survey)
    {

        return view('surveys.edit', compact('survey'));
    }

    public function update(Request $request, Survey $survey)
    {
        $request->validate([
            'question_type' => 'required', 'survey_type' => 'required',
            'title' => 'required', 'indications' => 'required', 'created_at' => 'required',
            'updated_at' => 'required', 'effective_date' => 'required'
        ]);
        
        $survey->question_type = $request->question_type;
        $survey->survey_type = $request->survey_type;
        $survey->title = $request->title;
        $survey->indications = $request->indications;
        $survey->created_at = $request->created_at;
        $survey->updated_at = $request->updated_at;
        $survey->effective_date = $request->effective_date;

        $survey->save();
        return redirect()->route('survey.index');
    }
}
