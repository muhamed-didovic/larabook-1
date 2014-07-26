<?php
$I = new FunctionalTester($scenario);
$I->am('a Larabook member');
$I->wantTo('list all users');

$I->haveAnAccount(['username' => 'foo']);
$I->haveAnAccount(['username' => 'bar']);
$I->amOnPage('/users');
$I->see('foo');
$I->see('bar');
