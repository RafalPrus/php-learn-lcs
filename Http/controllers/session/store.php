<?php

use Core\Authenticator;
use Core\Session;
use Core\ValidationException;
use Http\Forms\LoginForm;

$email = $_POST['email'];
$password = $_POST['password'];


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




//return view('session/create.view.php', [
//    'errors' => $form->errors()
//]);
