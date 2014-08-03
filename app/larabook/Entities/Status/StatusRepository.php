<?php namespace Larabook\Entities\Status;

use Larabook\Entities\Status\Status;
use Larabook\Entities\User\User;

class StatusRepository {

    /**
    * Get all statuses
    *
    *
    */
    public function getAll(User $user)
    {
        return $user->statuses()->with('user')->latest()->get();
    }

    /**
    * Save a new status for a user
    *
    * @param Status $status
    * @param integer $userId
    * @return mixed
    */
    public function save(Status $status, $userId)
    {
        return User::findOrFail($userId)->statuses()->save($status);
    }

    /**
    * Get the status feed for a user
    *
    * @return mixed
    */
    public function getFeed(User $user)
    {
        $followIds = $user->follows()->lists('followed_id');
        $followIds[] = $user->id;

        return Status::whereIn('user_id', $followIds)->latest()->get();
    }

}
