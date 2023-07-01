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
        ];
        $books2 = [
                [
                    'name' => 'Do Androids Dream of Electric Sheep',
                    'author' => 'Philip K. Dick',
                    'purchaseUrl' => 'http://www.buyit.com',
                    'release' => 1968
                ],
                [
                    'name' => 'Project Hail Mary',
                    'author' => 'Andy Weir',
                    'purchaseUrl' => 'http://www.buyitnow.com',
                    'release' => 2021
                ],
                [
                    'name' => 'The Martian',
                    'author' => 'Andy Weir',
                    'purchaseUrl' => 'http://www.buyitnow.com',
                    'release' => 2011
                ],
        ];
        function filter($items, $fn) {
            $filteredItems = [];
            foreach ($items as $item) {
                if ($fn($item)) {
                    $filteredItems[] = $item;
                }
            }

            return $filteredItems;
        }
        $filteredBooks = filter($books2, function ($book) {
            return $book['release'] >= 2000 && $book['release'] < 2020;
        })
    ?>
    <h1>
        Recomended Books
    </h1>
    <ul>
        <?php foreach ($books as $book) : ?>
            <li><?= $book ?></li>
        <?php endforeach; ?>
    </ul>
    <ul>
        <?php foreach ($books2 as $bookWithKey) : ?>
            <?php if ($bookWithKey['author'] === 'Andy Weir') : ?>
                <li>
                    <a href="<?= $bookWithKey['purchaseUrl']?>">
                    <?= $bookWithKey['name'] ?>
                    </a>
                    <?= $bookWithKey['release'] ?>
                </li>
            <?php endif; ?>
        <?php endforeach; ?>
    </ul>
    <ul>
        <?php foreach ($filteredBooks as $bookWithKey2) : ?>
            <li>
                <a href="<?= $bookWithKey2['purchaseUrl']?>">
                    <?= $bookWithKey2['name'] ?>
                </a>
                <?= $bookWithKey2['release'] ?>
                By
                <?= $bookWithKey2['author'] ?>
            </li>
        <?php endforeach; ?>
    </ul>

</body>
</html>