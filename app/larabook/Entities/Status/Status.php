<?php namespace Larabook\Entities\Status;

use Eloquent;
use Laracasts\Commander\Events\EventGenerator;
use Larabook\Commanding\Status\Events\StatusWasPublished;

class Status extends Eloquent {

    use EventGenerator;

    /**
    * Fillable fields for a new status
    *
    * @var array $fillable
    */
    protected $fillable = ['body'];

    /**
    * A status belongs to a user
    *
    * @return mixed
    */
    public function user()
    {
        return $this->belongsTo('Larabook\Entities\User\User');
    }


    /**
    * Save a new status
    *
    * @param string $body
    * @return static
    */
    public static function publish($body)
    {
        $status = new static(compact('body'));

        $status->raise(new StatusWasPublished($body));

        return $status;
    }
}
