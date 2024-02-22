<?php

namespace App\Http\Controllers;

// use App\Http\Requests\editSurveys;
// use App\Mail\surveyMailable;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Mail;
// use App\Http\Requests\SurveysSurvey;

use App\Mail\SurveyMailable;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use App\Models\UserFormResponse;
use Illuminate\Support\Facades\URL;
use App\Models\Form;


class EmailController extends Controller
{

    public function index(Request $request)
    {
        $users = User::all();
        $formId = $request->input('form_id');
        return view('email.send', compact('users', 'formId'));
    }


    public function store(Request $request)
    {
        // dd($request->all());
        // Obtiene el ID del formulario de la solicitud
    $formId = $request->input('form_id');

    // Asocia los usuarios seleccionados con el formulario
    foreach ($request->user_id as $userId) {
        // Genera una URL firmada única para cada usuario
        $responseLink = URL::temporarySignedRoute('survey.form', now()->addHours(24), ['user_id' => $userId, 'form_id' => $formId]);

        // Guarda la URL en la base de datos
        UserFormResponse::create([
            'user_id' => $userId,
            'form_id' => $formId,
            'response_link' => $responseLink,
        ]);
    }

    }
}
