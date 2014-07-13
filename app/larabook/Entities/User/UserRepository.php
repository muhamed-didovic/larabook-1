<?php namespace Larabook\Entities\User;

use Larabook\Entities\User\User;

class UserRepository {

    /**
    * Persist a user
    *
    * @param User $user
    * @return void
    */
    public function save(User $user)
    {
        return $user->save();
    }
}
