<?php namespace Larabook\Mailers;

use Larabook\Mailers\Mailer;
use Larabook\Entities\User\User;

class UserMailer extends Mailer{

    public function sendWelcomeMessageTo(User $user)
    {
        $subject = 'Welcome to Larabook';
        $view = 'emails.registration.confirm';
        //4th param is data which is not used in this case
        //defaults to empty array
        //$data = [];

        $this->sendTo($user, $subject, $view);
    }
}
