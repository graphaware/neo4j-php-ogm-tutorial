<?php

// list-movies.php

require_once 'bootstrap.php';

$limit = isset($argv[1]) ? (int) $argv[1] : 10;

/** @var \Demo\Movie[] $movies */
$movies = $entityManager->getRepository(\Demo\Movie::class)->findBy([], null, $limit);

foreach ($movies as $movie) {
    echo sprintf("- %s\n", $movie->getTitle());
}