<?php

namespace Demo;

use GraphAware\Neo4j\OGM\Common\Collection;
use GraphAware\Neo4j\OGM\Annotations as OGM;

/**
 *
 * @OGM\Node(label="User")
 */
class User
{
    /**
     * @var int
     *
     * @OGM\GraphId()
     */
    protected $id;

    /**
     * @var string
     *
     * @OGM\Property(type="string")
     */
    protected $login;

    /**
     * @var Collection
     *
     * @OGM\Relationship(relationshipEntity="MovieRating", type="RATED", direction="OUTGOING", collection=true, mappedBy="user")
     */
    protected $ratings;

    public function __construct()
    {
        $this->ratings = new Collection();
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @param string $login
     */
    public function setLogin($login)
    {
        $this->login = $login;
    }

    /**
     * @return Collection|MovieRating[]
     */
    public function getRatings()
    {
        return $this->ratings;
    }

    public function rateMovieWithScore(Movie $movie, $score)
    {
        $rating = new MovieRating($this, $movie, (float) $score);
        $this->getRatings()->add($rating);
        $movie->getRatings()->add($rating);
    }
}