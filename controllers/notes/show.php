<?php

use Core\Database;

$config = require base_path('config.php');
$db = new Database($config['database']);


$currentUserId = 2;


/*$test_query = $db->query('select * from notes where id = :id', [
    ':id' => $_GET['id']
]);*/

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $note = $db->query('select * from notes where id = :id', [
        ':id' => $_GET['id']
    ])->findOrFail();


    authorize($note['user_id'] === $currentUserId);

    $db->query('DELETE FROM notes where id = :id', [
        ':id' => $_GET['id']
    ]);

    header('location: /notes');
    die();
} else {
    $note = $db->query('select * from notes where id = :id', [
        ':id' => $_GET['id']
    ])->findOrFail();


    authorize($note['user_id'] === $currentUserId);


    view('notes/show.view.php', [
        'heading' => 'Note',
        'note' => $note
    ]);
}