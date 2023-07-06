<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve('Core\Database');


$currentUserId = 2;


$note = $db->query('select * from notes where id = :id', [
    ':id' => $_POST['id']
])->findOrFail();

authorize($note['user_id'] === $currentUserId);

$errors = [];

if (! Validator::string($_POST['body'], 1, 1000)) {
    $errors['body'] = 'More than 1,000 characters not allowed.';
}

if (! empty($errors)) {
    return view('notes/edit.view.php', [
        'heading' => 'Edit Note',
        'errors' => $errors,
        'note' => $note
    ]);
}

$db->query('UPDATE notes SET body = :body where id = :id', [
    ':body' => $_POST['body'],
    ':id' => $_POST['id']
]);

header('location: /notes');
die();