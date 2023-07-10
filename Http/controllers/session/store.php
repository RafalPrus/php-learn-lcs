<?php

use Core\Authenticator;
use Core\Session;
use Core\ValidationException;
use Http\Forms\LoginForm;


$form = LoginForm::validate($attributes = [
    'email' => $email,
    'password' => $password
]);


$signedIn = (new Authenticator)->attempt(
    $attributes['email'], $attributes['password']
);

if (!$signedIn)
{
    $form->error('password', 'Incorrect password or user')
        ->throw();
}

redirect('/');