<?php


use Core\Database;
use Core\Validator;
use Core\App;

$email = $_POST['email'];
$password = $_POST['password'];

$errors = [];

if (! Validator::email($email)) {
    $errors['email'] = 'Please provide an valid email adress';
}

if (! Validator::string($password, 7, 255)) {
    $errors['password'] = 'Please provide an valid password';
}

if (! empty($errors)) {
    return view('registration/create.view.php', [
        'errors' => $errors
    ]);
}


// validate the form inputs

$db = App::resolve('Core\Database');

$user = $db->query('SELECT * FROM users WHERE email = :email', [
    'email' => $email,
])->find();

if ($user) {
    header('location: /');
} else {
    $db->query('INSERT INTO users(email, password) VALUES(:email, :password)', [
        'email' => $email,
        'password' => $password,
    ]);

    // mark that the user has logged in
    $_SESSION['user'] = [
        'email' => $email
    ];

    header('location: /');
    die();
}

