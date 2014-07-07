<?php

class PagesController extends BaseController {

    public function splash()
    {
        return View::make('pages.home');
    }

}
