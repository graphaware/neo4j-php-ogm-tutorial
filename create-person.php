<?php

use Demo\Person;

require_once 'bootstrap.php';

$newPersonName = $argv[1];
$newPersonBorn = (int) $argv[2];

$person = new Person();
$person->setName($newPersonName);
$person->setBorn($newPersonBorn);

$entityManager->persist($person);
$entityManager->flush();

echo sprintf('Created Person with ID "%d"', $person->getId());

