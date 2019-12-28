<?php namespace Larabook\Commanding\Status;

class PublishStatusCommand
{
    public $body;
    public $userId;

    public function __construct($body, $userId)
    {
        $this->body = $body;
        $this->userId = $userId;
    }
}
