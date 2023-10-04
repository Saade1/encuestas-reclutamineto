<?php

namespace App\Http\Controllers;

use App\Mail\surveyMailable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function index()
    {
        return view('users.index');
    }

    public function store(Request $request)
    {
        Mail::to('diosdelaguerra.satm@gmail.com')->send(new surveyMailable($request->all()));
        
        // session()->flash('info', 'mensaje enviado');

        return redirect()->route('responder.index')->with('info', 'mensaje enviado');
    }
    
}
