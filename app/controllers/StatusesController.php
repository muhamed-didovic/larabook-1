<?php

use Larabook\Validation\Forms\StatusForm;
use Larabook\Commanding\Status\PublishStatusCommand;
use Larabook\Entities\Status\StatusRepository;
use Larabook\Core\CommandBusTrait;

class StatusesController extends \BaseController {

    use CommandBusTrait;

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
        $statuses = $this->statusRepository->getAll(Auth::user()->id);
        // dd($statuses);
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

        $this->executeCommand(
            new PublishStatusCommand($input['body'], Auth::user()->id)
        );

        Flash::message('Your status has been updated');
        return Redirect::refresh();
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
