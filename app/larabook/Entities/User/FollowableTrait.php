<?php namespace Larabook\Entities\User;

trait FollowableTrait
{
    public function follows()
    {
        return $this->belongsToMany(static::class, 'follows', 'follower_id', 'followed_id')->withTimestamps();
    }

    public function followers()
    {
        return $this->belongsToMany(static::class, 'follows', 'followed_id', 'follower_id')->withTimestamps();
    }

    public function isFollowedBy(User $currentUser = null)
    {
        if (is_null($currentUser)) {
            return false;
        }

        $followedIds = $currentUser->follows()->lists('followed_id');

        return in_array($this->id, $followedIds);
    }
}
