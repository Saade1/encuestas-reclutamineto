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
            'form_type' => 'required', 'survey_type' => 'required',
            'title' => 'required', 'indications' => 'required', 'effective_date' => 'required'
        ];
    }
}
