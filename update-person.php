<?php

require_once 'bootstrap.php';

$name = $argv[1];
$newBornYear = (int) $argv[2];

$personsRepository = $entityManager->getRepository(\Demo\Person::class);
/** @var \Demo\Person $person */
$person = $personsRepository->findOneBy(['name' => $name]);

if ($person === null) {
    echo 'Person not found' . PHP_EOL;
    exit(1);
}

$person->setBorn($newBornYear);
$entityManager->flush();
