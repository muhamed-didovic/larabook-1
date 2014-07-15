<?php namespace Larabook\Entities\User;

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Eloquent, Hash;
use Laracasts\Commander\Events\EventGenerator;
use Larabook\Registration\Events\UserRegistered;

class User extends Eloquent implements UserInterface, RemindableInterface {

    use UserTrait, RemindableTrait, EventGenerator;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

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
        if(Hash::needsRehash($password))
        {
            $this->attributes['password'] = Hash::make($password);
        }
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

}
