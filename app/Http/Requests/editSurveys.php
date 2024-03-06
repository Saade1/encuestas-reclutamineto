<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class editSurveys extends FormRequest
{
    
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'survey_type' => 'required',
            'title' => 'required', 'indications' => 'required', 'effective_date' => 'required'
        ];
    }
}
