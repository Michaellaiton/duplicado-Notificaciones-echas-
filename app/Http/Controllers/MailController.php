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
            'title' => 'Bienvenido a BolsaTalentum  - Código de Validación',
            'body' => 'Para completar el proceso de registro y garantizar la seguridad de tu cuenta, necesitamos que verifiques tu dirección de correo electrónico. A continuación, encontrarás un código de validación único:',
            'token' => $token,
            'fin' => '¡Estamos emocionados de tenerte a bordo y esperamos que disfrutes de todas las funcionalidades que ofrecemos tu Compañía!'
        ];

        Mail::to('michaellaiton1@gmail.com')->send(new TestMail($details, $token));

        return inertia('emails/TestMail', ['details' => $details]);
    }
}
