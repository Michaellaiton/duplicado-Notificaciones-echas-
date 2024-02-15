<?php

namespace App\Http\Controllers;
use App\Mail\TestMail;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{

    public function sendEmail(){

        // Generar un token aleatorio (número)
        $token = rand(100000, 999999); // Puedes ajustar el rango según tus necesidades

        $details = [
            'title' => 'Correo de prueba proyecto DevProyect',
            'body' => 'Este es un ejemplo para enviar correos desde Gmail',
            'token' => $token,
        ];

        Mail::to('jaiderstivenquimbaya8@gmail.com')->send(new TestMail($details, $token));

        return inertia('emails/TestMail', ['details' => $details]);
    }
}
