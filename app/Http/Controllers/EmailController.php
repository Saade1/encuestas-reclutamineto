<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        return view('users.send', compact('users', 'formId'));
    }

    public function store(Request $request)
    {
        // Obtiene el ID del formulario de la solicitud
        $formId = $request->input('form_id');

        // Variable para almacenar los usuarios a los que ya se les ha enviado el formulario
        $alreadySentToUsers = [];

        // Asocia los usuarios seleccionados con el formulario
        foreach ($request->user_id as $userId) {
            // Verifica si ya se ha enviado el formulario a este usuario
            $existingResponse = UserFormResponse::where('user_id', $userId)
                ->where('form_id', $formId)
                ->first();

            if ($existingResponse) {
                // Si ya existe una entrada, registra que ya se ha enviado el formulario a este usuario
                $alreadySentToUsers[] = $userId;
            } else {
                // Si no existe una entrada, guarda una nueva entrada en la tabla UserFormResponse
                // Genera una URL firmada única para cada usuario
                $responseLink = URL::temporarySignedRoute('survey.form', now()->addHours(24), ['user_id' => $userId, 'form_id' => $formId]);

                // Guarda la URL en la base de datos
                UserFormResponse::create([
                    'user_id' => $userId,
                    'form_id' => $formId,
                    'response_link' => $responseLink,
                ]);

                // Obtiene los detalles del formulario para enviarlos por correo electrónico
                $formData = Form::find($formId);

                // Envía el correo electrónico al usuario con el enlace generado y los detalles del formulario
                $user = User::find($userId);
                Mail::to($user->email)->send(new SurveyMailable([
                    'name' => $user->name,
                    'formData' => $formData,
                    'response_link' => $responseLink,
                    'sender_company' => 'HIGHTECH', // Cambia 'TuCargo' por el cargo del remitente
                ]));
            }
        }

        if (!empty($alreadySentToUsers)) {
            // Aquí puedes hacer algo con los usuarios a los que ya se les ha enviado el formulario
            // Por ejemplo, puedes mostrar un mensaje que indique a qué usuarios ya se les ha enviado el formulario
            // Puedes personalizar este mensaje según tus necesidades
            return redirect()->route('survey.index')->with('info', 'El formulario ya se ha enviado a los siguientes usuarios: ' . implode(', ', $alreadySentToUsers));
        }

        // Si no se ha enviado el formulario a ningún usuario existente, redirige a la página de índice de encuestas
        return redirect()->route('survey.index');
    }

    
    
}
