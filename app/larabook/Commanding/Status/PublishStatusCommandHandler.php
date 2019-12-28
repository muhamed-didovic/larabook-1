<?php namespace Larabook\Commanding\Status;

use Laracasts\Commander\CommandHandler;
use Laracasts\Commander\Events\DispatchableTrait;
use Larabook\Entities\Status\Status;
use Larabook\Entities\Status\StatusRepository;

class PublishStatusCommandHandler implements CommandHandler
{

    use DispatchableTrait;

    /**
    * status repository
    *
    * @var StatusRepository $repository
    */
    protected $repository;

    public function __construct(StatusRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
    * Handle the PublishStatusCommand
    *
    * @param $command
    * @return mixed
    */
    public function handle($command)
    {
        $status = Status::publish($command->body);

        $status = $this->repository->save($status, $command->userId);

        $this->dispatchEventsFor($status);

        return $status;
    }
}
