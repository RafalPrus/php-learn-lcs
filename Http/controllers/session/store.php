<?php

// log in the users if correct

use Core\App;
use Core\Database;
use Core\Validator;
use Http\Forms\LoginForm;

$db = App::resolve(Database::class);

$email = $_POST['email'];
$password = $_POST['password'];

$form = new LoginForm();
if (! $form->validate($email, $password)) {
    return view('session/create.view.php', [
        'errors' => $form->errors()
    ]);
};



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
