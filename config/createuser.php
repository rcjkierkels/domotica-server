<?php

use App\Models\User;

return [
    /*
    * The class name of the user model to be used.
    */
    'model' => User::class,

    /*
    * The validation rules to check for user model input.
    */
    'validation_rules' => [
        'name'     => 'string|max:255',
        'email'    => 'string|email|max:255|unique:users',
        'password' => 'string|min:8',
    ],

];
