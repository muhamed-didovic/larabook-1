<?php namespace Larabook\Controllers;

use View, Input, Auth, Redirect, Flash;

class UsersController extends BaseController {

    public function settings($username)
    {
        //shouldn't reach here because of the route filter auth
        if(Auth::user()->username != $username)
            return Redirect::route('login.create');

        //get user settings
        //simulated
        $settings = ['setting1' => 'foo', 'setting2' => 'bar'];
        return View::make('users.settings', compact('settings'));
    }
}
