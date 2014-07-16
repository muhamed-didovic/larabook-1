<?php

use Larabook\Validation\Forms\LoginForm;

class SessionsController extends \BaseController {

    protected $loginForm;

    public function __construct(LoginForm $loginForm)
    {
        $this->loginForm = $loginForm;
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('sessions.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $input = Input::only('email', 'password');

        $this->loginForm->validate($input);

        if( Auth::attempt($input))
        {
            Flash::message('Welcome Back!');
            return Redirect::to('statuses');
        }

        return Redirect::back()->withInput();
}

    /**
     * Logout the currently logged in user
     *
     * @return Redirect
     */
    public function destroy()
    {
        Auth::logout();

        Flash::message('You have been logged out');
        return Redirect::home();
    }


}
