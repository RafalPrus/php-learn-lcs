<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Homework 1 08</title>
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
        $movies = [
            [   'title' => 'Interstellar',
                'releaseYear' => 2014,
            ],
            [   'title' => 'Spiderman - Universum',
                'releaseYear' => 2018,
            ],
            [   'title' => 'Nietykalni',
                'releaseYear' => 2011,
            ],
            [   'title' => 'Blade Runner 2049',
                'releaseYear' => 2017,
            ],
        ];

        function filterByDate($movies, $date) {
            $filteredMovies = [];
            foreach ($movies as $movie) {
                if ($movie['releaseYear'] > $date) {
                    $filteredMovies[] = $movie;
                }
            }

            return $filteredMovies;
        }
    ?>

</body>
    <h1>Filtered movies:</h1>
    <ul>
        <?php foreach(filterByDate($movies, 2011) as $movie) : ?>
            <li>
                <?= $movie['title'] ?>
            </li>
        <?php endforeach; ?>
    </ul>
</html>