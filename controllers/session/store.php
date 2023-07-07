<?php

// log in the users if correct

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$email = $_POST['email'];
$password = $_POST['password'];

$errors = [];

if (! Validator::email($email)) {
    $errors['email'] = 'provide a valid email';
}

if (! Validator::string($password)) {
    $errors['password'] = 'provide a valid pass';
}

if (! empty($errors)) {
    return view('session/create.view.php', [
        'errors' => $errors
    ]);
}

// match the credentials
$user = $db->query('SELECT * FROM users where email = :email', [
    'email' => $email])->find();

if ($user) {
    if (password_verify($password, $user['password'])) {
        login([
            'email' => $email
        ]);

        header('location: /');
        die();
    }
}

// check password

return view('session/create.view.php', [
    'errors' => [
        'password' => 'Incorrect password or user'
    ]
]);
