<?php

require 'functions.php';
require 'Database.php';
//require 'router.php';


$db = new Database();

$posts = $db->query("select * from posts")->fetchAll(PDO::FETCH_ASSOC);


foreach ($posts as $post) {
    echo "<li>" . $post['title'] ." </li>";
};

/*$second_pdo = new PDO($dsn);
$second_statement = $second_pdo->prepare("INSERT INTO posts (title) VALUES('My Fourth Blog Post')");
$second_statement->execute();*/




