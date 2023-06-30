<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Demo</title>
    <style>
        body {
            display: grid;
            place-items: center;
            height: 100vh;
            margin: 0;
            font-family: sans-serif;
        }
    </style>
</head>
<body>
    <?php
        $name = "Dark Matter";
        $read = true;
        if ($read) {
            $message = "You have read $name";
        } else {
            $message = "You have'nt read $name";
        }

        $books = [
                "Do Androids Dream of Electric Sheep",
                "The Langoliers",
                "Hail Mary"
        ]
    ?>
    <h1>
        Recomended Books
    </h1>
    <ul>
        <?php foreach ($books as $book) {
            echo "<li>$book</li>";
        }
        ?>
    </ul>

</body>
</html>