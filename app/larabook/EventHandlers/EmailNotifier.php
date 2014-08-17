<?php namespace Larabook\EventHandlers;

use Laracasts\Commander\Events\EventListener;
use Larabook\Commanding\Registration\Events\UserRegistered;
use Larabook\Mailers\UserMailer;

class EmailNotifier extends EventListener {

    protected $mailer;

    public function __construct(UserMailer $mailer)
    {
        $this->mailer = $mailer;
    }

    public function whenUserRegistered(UserRegistered $event)
    {
        $this->mailer->sendWelcomeMessageTo($event->user);
    }
}
