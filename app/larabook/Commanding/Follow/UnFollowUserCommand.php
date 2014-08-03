<?php namespace Larabook\Commanding\Follow;

use Exception;

class UnFollowUserCommand {

    protected $userIdToUnFollow;
    protected $userId;

    public function __construct($userIdToUnFollow, $userId)
    {
        $this->userIdToUnFollow = $userIdToUnFollow;
        $this->userId = $userId;
    }

    public function getUserIdToUnFollow()
    {
        if(! is_numeric($this->userIdToUnFollow))
            throw new Exception('not a number');

        return $this->userIdToUnFollow;
    }

    public function getUserId()
    {
         if(! is_numeric($this->userIdToUnFollow))
            throw new Exception('not a number');

        return $this->userId;
    }

}
