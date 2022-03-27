<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PostCreatedNotificationMailable extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $subject = 'Nueva Publicación Creada, Inicia Sesión para verificar la actividad.';
    public $teamName = '';
    public $postTitle = '';
    public $postDescription = '';

    public function __construct($team, $title, $description)
    {
        $this->teamName = $team;
        $this->postTitle = $title;
        $this->postDescription = $description;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.created-notification')->with([
            'subject' => $this->subject,
        ]);
    }
}
