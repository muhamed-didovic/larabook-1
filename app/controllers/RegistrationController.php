<?php

use Larabook\Validation\Forms\RegistrationForm;
use Larabook\Registration\RegisterUserCommand;
use Larabook\Core\CommandBusTrait;

class RegistrationController extends BaseController {

    use CommandBusTrait;

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
        $this->registrationForm->validate(
            Input::only('username', 'email', 'password', 'password_confirmation')
        );

        extract(Input::only('username', 'email', 'password'));

        $user = $this->executeCommand(
            new RegisterUserCommand($username, $email, $password)
        );

        Auth::login($user);

        return Redirect::home();
    }
}
