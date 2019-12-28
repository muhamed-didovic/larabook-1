<?php namespace Larabook\Entities\User;

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Eloquent;
use Hash;
use Laracasts\Commander\Events\EventGenerator;
use Larabook\Commanding\Registration\Events\UserRegistered;
use Laracasts\Presenter\PresentableTrait;
use Larabook\Entities\User\FollowableTrait;

class User extends Eloquent implements UserInterface, RemindableInterface
{

    use UserTrait, RemindableTrait, EventGenerator, PresentableTrait, FollowableTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
    * Path to the user presenter
    *
    * @var string $presenter
    */
    protected $presenter = 'Larabook\Presenters\User\UserPresenter';

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = array('password', 'remember_token');

    /**
    * The fields allowed for mass assignment
    *
    * @var array
    */
    protected $fillable = ['username', 'email', 'password'];

    /**
    * Hash user password before saving to the database
    *
    * @param $password
    * @return void
    */
    public function setPasswordAttribute($password)
    {
        if (Hash::needsRehash($password)) {
            $this->attributes['password'] = Hash::make($password);
        } else {
            $this->attributes['password'] = $password;
        }
    }

    /**
    * A user has many statuses
    *
    * @return mixed
    */
    public function statuses()
    {
        return $this->hasMany('Larabook\Entities\Status\Status')->latest();
    }

    /**
    * Register a new user
    *
    * @param $username
    * @param $email
    * @param $password
    * @return static
    */
    public static function register($username, $email, $password)
    {
        $user = new static(compact('username', 'email', 'password'));

        $user->raise(new UserRegistered($user));

        return $user;
    }

    /**
    * Determine if given user is the current logged in user
    *
    * @param User $user
    * @return bool
    */
    public function isCurrent(User $user = null)
    {
        if (is_null($user)) {
            return false;
        }

        return $this->username == $user->username;
    }
}
