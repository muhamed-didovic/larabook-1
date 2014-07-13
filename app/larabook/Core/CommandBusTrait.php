<?php namespace Larabook\Core;

use App;

trait CommandBusTrait {

    /**
    * Exectute the command
    *
    * @param $command
    * @return mixed
    */
    public function executeCommand($command)
    {
        return $this->getCommandBus()->execute($command);
    }


    /**
    * Returns an instance of the command bus
    *
    * @return Laracasts\Commander\CommandBus
    */
    protected function getCommandBus()
    {
        return App::make('Laracasts\Commander\CommandBus');
    }
}
