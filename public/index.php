<?php
const BASE_PATH = __DIR__ . '/../';
require BASE_PATH.'Core/functions.php';


spl_autoload_register(function ($class) {
    // Core/Database
    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);
    require base_path("{$class}.php");
});

$router = new \Core\Router();

$routes = require base_path('routes.php');
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

// $method = isset($_POST['_method']) ? $_POST['_method'] : $_SERVER['REQUEST_METHOD'];

$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

$router->route($uri, $method);




/*$param = $_GET['id'];

$query = "select * from posts where id = :id";
$posts = $db->query($query, [':id' => $param])->fetchAll();


foreach ($posts as $post) {
    echo "<li>" . $post['title'] ." </li>";
};*/

/*$second_pdo = new PDO($dsn);
$second_statement = $second_pdo->prepare("INSERT INTO posts (title) VALUES('My Fourth Blog Post')");
$second_statement->execute();*/




