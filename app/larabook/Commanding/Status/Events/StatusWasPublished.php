<?php namespace Larabook\Commanding\Status\Events;

class StatusWasPublished
{

    /**
    * The published status body
    * @var string $body
    */
    public $body;

    public function __construct($body)
    {
        $this->body = $body;
    }
}
