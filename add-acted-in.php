<?php

// add-acted-in.php

require_once 'bootstrap.php';

$actor = $argv[1];
$title = $argv[2];

$personsRepo = $entityManager->getRepository(\Demo\Person::class);
$moviesRepo = $entityManager->getRepository(\Demo\Movie::class);

/** @var \Demo\Person $person */
$person = $personsRepo->findOneBy(['name' => $actor]);

if (null === $person) {
    echo sprintf('The person with name "%s" was not found', $actor);
    exit(1);
}

/** @var \Demo\Movie $movie */
$movie = $moviesRepo->findOneBy(['title' => $title]);

if (null === $movie) {
    echo sprintf('The movie with title "%s" was not found', $title);
}

$person->getMovies()->add($movie);
$movie->getActors()->add($person);
$entityManager->flush();
