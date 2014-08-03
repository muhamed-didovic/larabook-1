<?php namespace Larabook\Commanding\Follow;

use Exception;

class FollowUserCommand {

    protected $userIdToFollow;
    protected $userId;

    public function __construct($userIdToFollow, $userId)
    {
        $this->userIdToFollow = $userIdToFollow;
        $this->userId = $userId;
    }

    public function getUserIdToFollow()
    {
        if(! is_numeric($this->userIdToFollow))
            throw new Exception('not a number');

        return $this->userIdToFollow;
    }

    public function getUserId()
    {
         if(! is_numeric($this->userIdToFollow))
            throw new Exception('not a number');

        return $this->userId;
    }

}
