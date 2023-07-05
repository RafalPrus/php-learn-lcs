<?php

const BASE_PATH = __DIR__ . '/../';

require BASE_PATH . 'core/functions.php';

spl_autoload_register(function ($class) {
    // Core/Database
    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);
    require base_path("{$class}.php");
});

require base_path('core/router.php');




/*$param = $_GET['id'];

$query = "select * from posts where id = :id";
$posts = $db->query($query, [':id' => $param])->fetchAll();


foreach ($posts as $post) {
    echo "<li>" . $post['title'] ." </li>";
};*/

/*$second_pdo = new PDO($dsn);
$second_statement = $second_pdo->prepare("INSERT INTO posts (title) VALUES('My Fourth Blog Post')");
$second_statement->execute();*/




