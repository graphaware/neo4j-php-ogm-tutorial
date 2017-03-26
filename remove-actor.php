<?php

// remove-actor.php

require_once 'bootstrap.php';

$name = $argv[1];
$mode = isset($argv[2]) && 'force' === $argv[2] ? 'force' : 'soft';

echo sprintf("Deletion mode is %s\n", strtoupper($mode));

$personsRepo = $entityManager->getRepository(\Demo\Person::class);
/** @var \Demo\Person $person */
$person = $personsRepo->findOneBy(['name' => $name]);

if (null === $person) {
    echo sprintf('The person with name "%s" was not found', $name);
    exit(1);
}

if ('force' === $mode) {
    $entityManager->remove($person, true);
} elseif ('soft' == $mode) {
    foreach ($person->getMovies() as $movie) {
        $movie->getActors()->removeElement($person);
    }
    $person->getMovies()->clear();
    $entityManager->remove($person);
}

$entityManager->flush();