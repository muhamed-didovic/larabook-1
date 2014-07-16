<?php namespace Codeception\Module;

use Laracasts\TestDummy\Factory as TestDummy;

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
        $this->have('Larabook\Entities\User\User', $overrides);
    }

    public function postAStatus($body)
    {
        $I = $this->getModule('Laravel4');
        $I->fillField('body', $body);
        $I->click('Post Status');
        //$this->have('Larabook\Entities\Status\Status', $overrides);
    }

    protected function have($model, $overrides = [])
    {
        return TestDummy::create($model, $overrides);
    }

}
