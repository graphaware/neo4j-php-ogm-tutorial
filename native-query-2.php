<?php

// native-query-2.php

require_once 'bootstrap.php';

$em = $entityManager;

$query = $em->createQuery('MATCH (n:Person)-[:ACTED_IN]->(movie)<-[:ACTED_IN]-(other)
WHERE n.name CONTAINS "Tom"
RETURN n, collect(other)[0..2] AS coactors, size((n)-[:ACTED_IN]->()) AS totalActs');
$query
    ->addEntityMapping('n', \Demo\Person::class)
    ->addEntityMapping('coactors', \Demo\Person::class, \GraphAware\Neo4j\OGM\Query::HYDRATE_COLLECTION);

$result = $query->execute();

foreach ($result as $row) {
    echo sprintf('Person found with name "%s", he played in %d movies' . PHP_EOL, $row['n']->getName(), $row['totalActs']);
    echo 'His first two co-actors are ' . PHP_EOL;
    foreach ($row['coactors'] as $coactor) {
        echo sprintf(' -- %s' .PHP_EOL, $coactor->getName());
    }
}