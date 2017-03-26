<?php

use GraphAware\Neo4j\OGM\EntityManager;

require_once 'vendor/autoload.php';

$entityManager = EntityManager::create('http://localhost:7474');