<?php namespace Larabook\Controllers;

use Input, Auth, Redirect, Flash;
use Larabook\Commanding\Follow\FollowUserCommand;
use Larabook\Commanding\Follow\UnFollowUserCommand;

class FollowsController extends BaseController {

    /**
    * Follow a user
    *
    * @return Redirect
    */
    public function store()
    {
        $input = array_add(Input::only('userIdToFollow'), 'userId', Auth::id());

        $this->execute(FollowUserCommand::class, $input);

        Flash::success('You are now following this user.');

        return Redirect::back();
    }

    /**
    * Unfollow a user
    *
    * @return Redirect
    */
    public function destroy()
    {
        $input = array_add(Input::only('userIdToUnFollow'), 'userId', Auth::id());

        $this->execute(UnFollowUserCommand::class, $input);

        Flash::success('You are no longer following this user.');

        return Redirect::back();
    }
}
