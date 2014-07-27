<?php namespace Larabook\Controllers;

use View, Input, Auth, Redirect, Flash;
use Larabook\Entities\User\UserRepository;

class UsersController extends BaseController {

    protected $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        $users = $this->repository->getPaginated(10);

        return View::make('users.index', compact('users'));
    }

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

    public function show($username)
    {
        //validate the url input
        $user = $this->repository->findByUsernameWithStatuses($username);

        return View::make('users.show', compact('user'));
    }
}
