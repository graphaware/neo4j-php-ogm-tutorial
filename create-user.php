<?php

// create-user.php

require_once 'bootstrap.php';

$login = $argv[1];

$user = new \Demo\User();
$user->setLogin($login);

$entityManager->persist($user);
$entityManager->flush();

echo sprintf('Created user with login "%s"', $login);