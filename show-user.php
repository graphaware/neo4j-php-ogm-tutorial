<?php

// show-user.php

require_once 'bootstrap.php';

$login = $argv[1];

$userRepo = $entityManager->getRepository(\Demo\User::class);

/** @var \Demo\User $user */
$user = $userRepo->findOneBy(['login' => $login]);

echo sprintf("User '%s' has the following ratings : \n", $user->getLogin());
foreach ($user->getRatings() as $rating) {
    echo sprintf(" - %s : %f\n", $rating->getMovie()->getTitle(), $rating->getScore());
}