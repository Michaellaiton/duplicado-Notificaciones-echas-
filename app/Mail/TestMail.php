<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class TestMail extends Mailable
{
    use Queueable, SerializesModels;


    public $details;
    public $token;

    /**
     * Create a new message instance.
     *
     * @return void
     */


    public function __construct($details, $token)
    {
        //
        $this->details  =  $details;
        $this->token = $token;
    }

        /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Correo de prueba proyecto DevProyect')->view('emails.TestMail');
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'Codigo de confirmación',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            view: 'emails.TestMail',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
