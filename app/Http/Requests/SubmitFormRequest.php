<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubmitFormRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            // 'survey_id' => 'required|exists:surveys,id', 'answers.*' => 'required', 
            // 'selected_responses.*' => 'required',
        ];
    }
}
