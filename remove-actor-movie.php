<?php

// remove-actor-movie.php

require_once 'bootstrap.php';

$name = $argv[1];
$title = $argv[2];

$actorRepo = $entityManager->getRepository(\Demo\Person::class);

/** @var \Demo\Person $actor */
$actor = $actorRepo->findOneBy(['name' => $name]);

if (null === $actor) {
    echo sprintf('Person with name "%s" not found', $name);
    exit(1);
}

$movie = null;

foreach ($actor->getMovies() as $m) {
    if ($m->getTitle() === $title) {
        $movie = $m;
    }
}

if (null === $movie) {
    echo sprintf('No movie with title "%s" was found on the Person instance', $title);
    exit(1);
}

$actor->getMovies()->removeElement($movie);
$movie->getActors()->removeElement($actor);
$entityManager->flush();