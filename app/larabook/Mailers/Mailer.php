<?php namespace Larabook\Mailers;

use Illuminate\Mail\Mailer as IlluminateMailer;

abstract class Mailer {
    /**
     * Instance of the Laravel Mailer class
     * @var Illuminate\Mail\Mailer $mail
     */
    protected $mailer;

    public function __construct(IlluminateMailer $mailer)
    {
        $this->mailer = $mailer;
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
        $this->mailer->queue($view, $data, function($message) use ($user, $subject)
        {
            $message->to($user->email)->subject($subject);
        });
    }
}
