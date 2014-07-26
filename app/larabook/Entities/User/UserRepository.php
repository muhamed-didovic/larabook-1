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

    /**
    * Returns a paginated list of users
    *
    * @param int $limit
    * @return mixed
    */
    public function getPaginated($limit = 25)
    {
        return User::orderBy('username', 'asc')->simplePaginate($limit);
    }
}
