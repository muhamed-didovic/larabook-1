<?php namespace Larabook\Controllers;

use View, Input, Auth, Redirect, Flash;
use Larabook\Validation\Forms\RegistrationForm;
use Larabook\Registration\RegisterUserCommand;
use Laracasts\Commander\CommanderTrait;

class RegistrationController extends BaseController {

    use CommanderTrait;
    /**
    * @var RegistrationForm
    */
    private $registrationForm;

    /**
    * Constructor
    *
    * @param CommandBus $commandBus
    * @param RegistrationForm $registrationForm
    */
    public function __construct(RegistrationForm $registrationForm)
    {
        $this->registrationForm = $registrationForm;
    }

    /**
    * Show a form to register the user
    *
    * @return View
    */
    public function create()
    {
        return View::make('registration.create');
    }

    /**
    * Create a new user account
    *
    * @return View
    */
    public function store()
    {
        $input = Input::only('username', 'email', 'password', 'password_confirmation');

        $this->registrationForm->validate($input);

        $user = $this->execute(RegisterUserCommand::class, $input);

        Auth::login($user);

        Flash::message('Glad to have you as a new Larabook member.');

        return Redirect::home();
    }
}
