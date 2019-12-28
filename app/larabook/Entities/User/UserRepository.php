<?php namespace Larabook\Entities\User;

use Larabook\Entities\User\User;

class UserRepository
{

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

    /**
    * Fetch a user by their username
    *
    * @param string $username
    * @return mixed
    */
    public function findByUsername($username)
    {
        $this->user =  User::where('username', '=', $username)->firstOrFail();
    }

    public function findByUsernameWithStatuses($username)
    {
        return User::with('statuses')->whereUsername($username)->firstOrFail();
    }

    /**
    * Find a user by their id.
    *
    * @param int $id
    * @return User
    */
    public function findById($id)
    {
        return User::findOrFail($id);
    }

    /**
    * Follow a user
    *
    * @param int $userIdToFollow
    * @param User $user
    * @return mixed
    */
    public function follow($userIdToFollow, User $user)
    {
        return $user->follows()->attach($userIdToFollow);
    }

    /**
    * Un-Follow a user
    *
    * @param int $userIdToUnFollow
    * @param User $user
    * @return mixed
    */
    public function unFollow($userIdToUnFollow, User $user)
    {
        return $user->follows()->detach($userIdToUnFollow);
    }
}
