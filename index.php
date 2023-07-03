<?php

require 'functions.php';
//require 'router.php';

$dsn = "mysql:host=localhost;port=3306;dbname=myapp;user=root;charset=utf8mb4";

$pdo = new PDO($dsn);

$statement = $pdo->prepare("SELECT * FROM posts");

$statement->execute();

$posts = $statement->fetchAll(PDO::FETCH_ASSOC);

foreach ($posts as $post) {
    echo "<li>" . $post['title'] ." </li>";
};

/*$second_pdo = new PDO($dsn);
$second_statement = $second_pdo->prepare("INSERT INTO posts (title) VALUES('My Fourth Blog Post')");
$second_statement->execute();*/




