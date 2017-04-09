<?php

// native-query.php

require_once 'bootstrap.php';

$em = $entityManager;

$query = $em->createQuery('MATCH (n:Person) WHERE n.name CONTAINS {part} RETURN n LIMIT 10');
$query->addEntityMapping('n', \Demo\Person::class);
$query->setParameter('part', 'Tom');

$result = $query->execute();

foreach ($result as $person) {
    echo sprintf('Person found with name "%s"' . PHP_EOL, $person->getName());
}