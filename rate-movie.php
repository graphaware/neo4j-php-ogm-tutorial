<?php

// rate-movie.php

require_once 'bootstrap.php';

$login = $argv[1];
$title = $argv[2];
$score = (float) $argv[3];

/** @var \Demo\User $user */
$user = $entityManager->getRepository(\Demo\User::class)->findOneBy(['login' => $login]);

/** @var \Demo\Movie $movie */
$movie = $entityManager->getRepository(\Demo\Movie::class)->findOneBy(['title' => $title]);

$user->rateMovieWithScore($movie, $score);
$entityManager->flush();