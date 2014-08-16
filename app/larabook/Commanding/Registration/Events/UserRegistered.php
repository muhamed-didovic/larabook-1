<?php namespace Larabook\Commanding\Registration\Events;

use Larabook\Entities\User\User;

class UserRegistered {

    public $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }
}
