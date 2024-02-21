<?php

namespace App\Mail;

use Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CreateUserMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $dotenv = \Dotenv\Dotenv::createImmutable(dirname(__DIR__, 2));
        $dotenv->load();

        try {
            return $this->view('mail.createUser')
                ->to($this->data->email, $this->data->name)
                ->from(env('MAIL_FROM_ADDRESS'), 'ProjetoRL')
                ->subject('Bem vindo!')
                ->with(['data' => $this->data]);
        } catch (Exception $e) {
            throw new Exception('Error', $e->getMessage());
        }
    }
}
