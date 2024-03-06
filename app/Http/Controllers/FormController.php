<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubmitFormRequest;
use Illuminate\Http\Request;
use App\Models\UserResponse; // Cambiado el modelo a UserResponse
use App\Models\Form;
use App\Models\Survey;
use App\Models\UserFormResponse; // Cambiado el modelo a UserResponse
use App\Models\SurveyResponses;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class FormController extends Controller
{
    public function showForm($user_id, $form_id)
    {
        // Verifica si el usuario ya ha respondido este formulario
        $userResponse = UserResponse::where('user_id', $user_id)
            ->where('form_id', $form_id)
            ->first();

        // Si el usuario ya ha respondido, redirecciona a alguna página de error o muestra un mensaje
        if ($userResponse) {
            return view('form.finished');
        }

        // Obtiene el formulario asociado al ID del formulario
        $form = Form::findOrFail($form_id);

        // Dar formato a la fecha de vigencia
        $formattedEffectiveDate = Carbon::parse($form->effective_date)->format('d/m/Y');

        // Obtiene todos los survey_ids asociados al formulario
        $survey_ids = $form->surveys()->pluck('id')->toArray();

        // Obtener el usuario actualmente autenticado
        $user = Auth::user();

        // // Carga la vista del formulario con los datos necesarios
        $form = Form::findOrFail($form_id);
        $survey_id = $form->surveys()->first()->id;
        $questions = Survey::where('id_form', $form_id)->get();
        return view('form.show', compact('form', 'user_id', 'survey_ids', 'questions', 'formattedEffectiveDate', 'user'));
    }


    public function submit(SubmitFormRequest $request, $user_id, $form_id)
    {
        // dd($request->all());

        // Recorrer y guardar las respuestas seleccionadas y las respuestas abiertas
        foreach ($request->input('question_ids') as $key => $question_id) {
            $answerData = [
                'user_id' => $user_id,
                'form_id' => $form_id,
                'survey_id' => $request->input('survey_ids')[$key],
                'question_id' => $question_id,
            ];

            // Si es una pregunta abierta, guardamos la respuesta del textarea
            if ($request->has("answers.{$question_id}")) {
                $answerData['answer'] = $request->input("answers.{$question_id}");
                UserResponse::create($answerData);
            }

            // Si es una pregunta de opción múltiple, guardamos la respuesta seleccionada
            if ($request->has("selected_responses_single.{$question_id}")) {
                $response_text = $request->input("selected_responses_single.{$question_id}");
                UserResponse::create([
                    'user_id' => $user_id,
                    'form_id' => $form_id,
                    'survey_id' => $request->input('survey_ids')[$key],
                    'question_id' => $question_id,
                    'answer' => $response_text,
                ]);
            }

            // Si es una pregunta de lista, guardamos las respuestas seleccionadas
            if ($request->has("selected_responses_multiple.{$question_id}")) {
                $selectedResponses = $request->input("selected_responses_multiple.{$question_id}");
                foreach ($selectedResponses as $response_text) {
                    UserResponse::create([
                        'user_id' => $user_id,
                        'form_id' => $form_id,
                        'survey_id' => $request->input('survey_ids')[$key],
                        'question_id' => $question_id,
                        'answer' => $response_text,
                    ]);
                }
            }
        }

        // Redireccionar a alguna página de éxito o mostrar un mensaje de éxito
        return redirect()->back()->with('success', 'Respuestas enviadas correctamente.');
    }
}
