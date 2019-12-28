<?php namespace Larabook\Controllers;

use View;
use Input;
use Auth;
use Redirect;
use Flash;
use Larabook\Validation\Forms\StatusForm;
use Larabook\Commanding\Status\PublishStatusCommand;
use Larabook\Entities\Status\StatusRepository;

class StatusesController extends BaseController
{

    /**
    * @var StatusForm $statusForm
    */
    protected $statusForm;

     /**
    * @var StatusRepository $statusRepository
    */
    protected $statusRepository;

    /**
    * The StatusesController constructor
    *
    * @param StatusForm $statusForm
    * @return void
    */
    public function __construct(StatusForm $statusForm, StatusRepository $statusRepository)
    {
        $this->statusForm = $statusForm;
        $this->statusRepository = $statusRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $statuses = $this->statusRepository->getFeed(Auth::user());

        return View::make('statuses.index', compact('statuses'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //Not in use because form is on the timeline page
    }


    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $input = Input::only('body');

        $this->statusForm->validate($input);

        $input['userId'] = Auth::user()->id;

        $user = $this->execute(PublishStatusCommand::class, $input);

        Flash::message('Your status has been updated');
        return Redirect::back();
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
