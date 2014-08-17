<?php namespace Larabook\Mailers;

use Illuminate\Mail\Mailer as Mail;

abstract class Mailer {
    /**
     * Instance of the Laravel Mailer class
     * @var Illuminate\Mail\Mailer $mail
     */
    protected $mail;

    public function __construct(Mail $mail)
    {
        $this->mail = $mail;
    }

    /**
     * Send an email
     * @param  Larabook\Entities\User\User $user
     * @param  string $subject
     * @param  string $view
     * @param  array $data
     * @return void
     */
    public function sendTo($user, $subject, $view, $data = [])
    {
        $this->mail->queue($view, $data, function($message) use ($user, $subject)
        {
            $message->to($user->email)->subject($subject);
        });
    }
}
