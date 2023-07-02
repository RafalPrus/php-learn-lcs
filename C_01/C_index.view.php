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