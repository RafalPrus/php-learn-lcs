<?php
use Core\Database;
use Core\Validator;
use Core\App;

$db = App::resolve('Core\Database');

$errors =[];

if (! Validator::string($_POST['body'], 1, 1000)) {
    $errors['body'] = 'More than 1,000 characters not allowed.';
}

if (! empty($errors)) {
    return view('notes/create.view.php', [
        'heading' => 'Create Note',
        'errors' => $errors
    ]);
}


if (empty($errors)) {
    $db->query('INSERT INTO notes(body, user_id) VALUES(:body, :user_id)', [
        'body' => $_POST['body'],
        'user_id' => 2
    ]);
    header('location: /notes');
    die();
}

// validation issue
