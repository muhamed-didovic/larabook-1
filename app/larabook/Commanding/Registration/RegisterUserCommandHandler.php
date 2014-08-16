<?php namespace Larabook\Commanding\Registration;

use Laracasts\Commander\CommandHandler;
use Larabook\Entities\User\UserRepository;
use Larabook\Entities\User\User;
use Laracasts\Commander\Events\DispatchableTrait;

class RegisterUserCommandHandler implements CommandHandler {

    use DispatchableTrait;

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

        $this->dispatchEventsFor($user);

        return $user;
    }

}
