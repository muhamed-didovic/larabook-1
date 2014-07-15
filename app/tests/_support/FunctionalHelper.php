<?php namespace Codeception\Module;

use Laracasts\TestDummy\Factory as TestDummy;
use Auth;

class FunctionalHelper extends \Codeception\Module
{

    public function signIn()
    {
        $this->haveAnAccount(['email' => 'foo@example.com', 'password' => 'foo']);

        $I = $this->getModule('Laravel4');

        $I->amOnPage('login');
        $I->fillField('email', 'foo@example.com');
        $I->fillField('password', 'foo');
        $I->click('Sign In');
    }


    public function haveAnAccount($overrides = [])
    {
        TestDummy::create('Larabook\Entities\User\User', $overrides);
    }

    public function logout()
    {
        if(Auth::check())
        {
            Auth::logout();
        }
    }

}
