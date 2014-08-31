<?php namespace Larabook\Validation\Forms;

use Laracasts\Validation\FormValidator;

class PasswordResetForm extends FormValidator {

    /**
    * Validation rules for the password reset form
    *
    * @var array
    */
    protected $rules = [
        'email' => 'required|email',
        'password' => 'required|alpha_num|between:6,12'
    ];
}
