<?php

use Core\App;
use Core\Database;

$db = App::resolve('Core\Database');

$currentUserId = 2;


$note = $db->query('select * from notes where id = :id', [
    ':id' => $_GET['id']
])->findOrFail();


authorize($note['user_id'] === $currentUserId);

$db->query('DELETE FROM notes where id = :id', [
    ':id' => $_POST['id']
]);

header('location: /notes');
die();