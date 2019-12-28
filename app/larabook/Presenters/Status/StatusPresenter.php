<?php namespace Larabook\Presenters\Status;

use Laracasts\Presenter\Presenter;

class StatusPresenter extends Presenter
{

    /**
    * Get the time since status was published
    *
    * @return date
    */
    public function timeSincePublished()
    {
        return $this->created_at->diffForHumans();
    }
}
