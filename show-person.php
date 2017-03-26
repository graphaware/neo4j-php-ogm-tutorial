<?php

// show-person.php

require_once 'bootstrap.php';

$name = $argv[1];

$personsRepository = $entityManager->getRepository(\Demo\Person::class);
/** @var \Demo\Person $person */
$person = $personsRepository->findOneBy(['name' => $name]);

if ($person === null) {
    echo 'Person not found' . PHP_EOL;
    exit(1);
}

echo sprintf("- %s is born in %d\n", $person->getName(), $person->getBorn());
echo "  The movies in which he acted are : \n";
foreach ($person->getMovies() as $movie) {
    echo sprintf("    -- %s\n", $movie->getTitle());
}