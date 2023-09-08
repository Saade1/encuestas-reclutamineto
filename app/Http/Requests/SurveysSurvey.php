<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SurveysSurvey extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'question_type' => 'required', 'survey_type' => 'required',
            'title' => 'required', 'indications' => 'required', 'created_at' => 'required',
            'updated_at' => 'required', 'effective_date' => 'required'
        ];
    }
    public function messages()
    {
        return[
            'question_type.required' => 'Debe seleccionar el tipo de pregunta',
            'survey_type.required'=>'Debe de selecionar el tipo de encuesta',
            'effective_date.required'=>'Debe seleccionar una fecha de vigencia',
            'title.required'=>'El titulo es obligatorio',
            'indications.required'=>'Las indicaciones son obligatorias',
        ];
    }
}
