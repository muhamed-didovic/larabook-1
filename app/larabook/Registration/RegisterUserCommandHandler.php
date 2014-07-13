<?php namespace Larabook\Registration;

use Laracasts\Commander\CommandHandler;
use Larabook\Entities\User\UserRepository;
use Larabook\Entities\User\User;

class RegisterUserCommandHandler implements CommandHandler {

    protected $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
    * Handle the RegisterUserCommand
    *
    * @param $command
    * @return mixed
    */
    public function handle($command)
    {
        $user = User::register(
            $command->username, $command->email, $command->password
        );

        $this->repository->save($user);

        return $user;
    }

}
