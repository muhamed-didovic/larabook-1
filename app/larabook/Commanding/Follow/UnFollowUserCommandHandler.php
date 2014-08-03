<?php namespace Larabook\Commanding\Follow;

use Laracasts\Commander\CommandHandler;
use Larabook\Entities\User\UserRepository;

class UnFollowUserCommandHandler implements CommandHandler {

    protected $userRepo;

    public function __construct(UserRepository $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    public function handle($command)
    {
        $user = $this->userRepo->findById($command->getUserId());

        $this->userRepo->unFollow($command->getUserIdToUnFollow(), $user);

        return $user;
    }
}
