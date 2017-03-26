<?php

// remove-rating.php

require_once 'bootstrap.php';

$login = $argv[1];
$title = $argv[2];

/** @var \Demo\User $user */
$user = $entityManager->getRepository(\Demo\User::class)->findOneBy(['login' => $login]);

/** @var \Demo\Movie $movie */
$movie = $entityManager->getRepository(\Demo\Movie::class)->findOneBy(['title' => $title]);

$ratingToDelete = null;
foreach ($user->getRatings() as $rating) {
    if ($rating->getMovie() === $movie) {
        $ratingToDelete = $rating;
    }
}

if (null === $ratingToDelete) {
    echo sprintf('Could not found rating from %s on %s', $user->getLogin(), $movie->getTitle());
    exit(1);
}

$user->getRatings()->removeElement($ratingToDelete);
$movie->getRatings()->removeElement($ratingToDelete);
$entityManager->remove($ratingToDelete);
$entityManager->flush();