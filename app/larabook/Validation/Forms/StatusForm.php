<?php namespace Larabook\Validation\Forms;

use Laracasts\Validation\FormValidator;

class StatusForm extends FormValidator
{

    /**
    * Validation rules for the status form
    *
    * @var array
    */
    protected $rules = [
        'body' => 'required' //meh, might make a rule in the future
    ];
}
