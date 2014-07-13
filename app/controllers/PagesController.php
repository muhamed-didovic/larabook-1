<?php

class PagesController extends BaseController {

    public function splash()
    {
        $person = new stdClass;
        $person->name = 'fred';
        $person->job = 'butt scratcher';
        $person->html = '<input type="text">fred</input>';
        return View::make('pages.home', compact('person'));
    }

}
