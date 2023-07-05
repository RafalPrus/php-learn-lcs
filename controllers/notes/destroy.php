<?php

use Core\Database;

$config = require base_path('config.php');
$db = new Database($config['database']);


$currentUserId = 2;


/*$test_query = $db->query('select * from notes where id = :id', [
    ':id' => $_GET['id']
]);*/


$note = $db->query('select * from notes where id = :id', [
    ':id' => $_GET['id']
])->findOrFail();


authorize($note['user_id'] === $currentUserId);

$db->query('DELETE FROM notes where id = :id', [
    ':id' => $_POST['id']
]);

header('location: /notes');
die();