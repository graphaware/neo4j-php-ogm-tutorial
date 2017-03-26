<?php

namespace Demo;

use GraphAware\Neo4j\OGM\Annotations as OGM;

/**
 *
 * @OGM\RelationshipEntity(type="RATED")
 */
class MovieRating
{
    /**
     * @var int
     *
     * @OGM\GraphId()
     */
    protected $id;

    /**
     * @var User
     *
     * @OGM\StartNode(targetEntity="User")
     */
    protected $user;

    /**
     * @var Movie
     *
     * @OGM\EndNode(targetEntity="Movie")
     */
    protected $movie;

    /**
     * @var float
     *
     * @OGM\Property(type="float")
     */
    protected $score;

    public function __construct(User $user, Movie $movie, $score)
    {
        $this->user = $user;
        $this->movie = $movie;
        $this->score = $score;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @return Movie
     */
    public function getMovie()
    {
        return $this->movie;
    }

    /**
     * @return float
     */
    public function getScore()
    {
        return $this->score;
    }
}