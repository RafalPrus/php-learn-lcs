<?php

use Core\Database;

$config = require base_path('config.php');
$db = new Database($config['database']);

$heading = 'Note';
$currentUserId = 2;


/*$test_query = $db->query('select * from notes where id = :id', [
    ':id' => $_GET['id']
]);*/

$note = $db->query('select * from notes where id = :id', [
    ':id' => $_GET['id']
])->findOrFail();


authorize($note['user_id'] === $currentUserId);


view('notes/show.view.php', [
    'heading' => 'Note',
    'note' => $note
]);