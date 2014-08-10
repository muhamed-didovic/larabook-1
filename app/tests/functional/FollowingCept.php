<?php
$I = new FunctionalTester($scenario);
$I->am('a Larabook user');
$I->wantTo('follow another user');

$I->haveAnAccount(['username' => 'testuser']);
$I->signIn();
$I->click('Browse Artisans');
$I->seeCurrentUrlEquals('/users');

$I->click('testuser');
$I->seeCurrentUrlEquals('/@testuser');

$I->click('Follow');
$I->seeCurrentUrlEquals('/@testuser');

$I->see('Stop Following');

$I->click('Stop Following');
$I->seeCurrentUrlEquals('/@testuser');
$I->see('Follow');
