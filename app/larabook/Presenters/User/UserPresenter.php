<?php namespace Larabook\Presenters\User;

use Laracasts\Presenter\Presenter;

class UserPresenter extends Presenter {

    /**
    * Present a link to the users gravatar
    *
    * @param int $size
    * @return string
    */
    public function gravatar($size = 45)
    {
        //check if user has gravatar
        $email = md5($this->email);

        return "//www.gravatar.com/avatar/{$email}?s={$size}&d=//placekitten.com/{$size}/{$size}";
    }

}
