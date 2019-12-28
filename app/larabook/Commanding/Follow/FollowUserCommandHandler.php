<?php namespace Larabook\Commanding\Follow;

use Laracasts\Commander\CommandHandler;
use Larabook\Entities\User\UserRepository;

class FollowUserCommandHandler implements CommandHandler
{

    protected $userRepo;

    public function __construct(UserRepository $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    public function handle($command)
    {
        $user = $this->userRepo->findById($command->getUserId());

        $this->userRepo->follow($command->getUserIdToFollow(), $user);

        return $user;
    }
}
