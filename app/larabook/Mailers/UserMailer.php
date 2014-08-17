<?php namespace Larabook\Mailers;

use Larabook\Mailers\Mailer;
use Larabook\Entities\User\User;

class UserMailer extends Mailer{

    public function sendWelcomeMessageTo(User $user)
    {
        $subject = 'Welcome to Larabook';
        $view = 'emails.registration.confirm';
        $data = [];

        $this->sendTo($user, $subject, $view, $data);
    }
}
