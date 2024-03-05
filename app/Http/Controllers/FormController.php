<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserResponse; // Cambiado el modelo a UserResponse
use App\Models\Form;
use App\Models\UserFormResponse; // Cambiado el modelo a UserResponse
use App\Models\SurveyResponses;
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
    // if ($userResponse) {
    //     return view('form.finished');
    // }

    // Obtiene el formulario asociado al ID del formulario
    $form = Form::findOrFail($form_id);

    // Obtiene el primer ID de encuesta asociado al formulario
    $survey_id = $form->surveys()->first()->id;

    // Carga la vista del formulario con los datos necesarios
    return view('form.show', compact('form', 'user_id', 'survey_id'));
}

    public function submit(Request $request, $user_id, $form_id)
    {
        // dd($request->all());

        // Validar los datos recibidos del formulario
        $request->validate([
            'survey_id' => 'required|exists:surveys,id',
        ]);

        // Recorrer las respuestas seleccionadas y guardarlas en la base de datos
        foreach ($request->input('selected_responses', []) as $response_id) {
            $response = SurveyResponses::find($response_id);
            if ($response) {
                UserResponse::create([
                    'user_id' => $user_id,
                    'form_id' => $form_id,
                    'survey_id' => $request->input('survey_id'),
                    'answer' => $response->answer, // Guardar la respuesta seleccionada
                    'selected_response_id' => $response_id,
                ]);
            }
        }

        // Recorrer y guardar las respuestas escritas en los textareas
        foreach ($request->input('answers', []) as $question_id => $answer) {
            UserResponse::create([
                'user_id' => $user_id,
                'form_id' => $form_id,
                'survey_id' => $request->input('survey_id'),
                'answer' => $answer, // Guardar la respuesta escrita en el textarea
                // 'selected_response_id' => null, // No hay respuesta seleccionada en este caso
            ]);
        }
        // Redireccionar a alguna página de éxito o mostrar un mensaje de éxito
        return redirect()->back()->with('success', 'Respuestas enviadas correctamente.');
    }
}
