<?php

use Core\App;
use Core\Database;

$db = App::resolve('Core\Database');



$notes = $db->query('select * from notes where user_id = 2')->get();


view('notes/index.view.php', [
    'heading' => 'My Notes',
    'notes' => $notes
]);
