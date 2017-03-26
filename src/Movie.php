<?php

// src/Movie.php

namespace Demo;

use GraphAware\Neo4j\OGM\Annotations as OGM;
use GraphAware\Neo4j\OGM\Common\Collection;

/**
 *
 * @OGM\Node(label="Movie")
 */
class Movie
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
    protected $title;

    /**
     * @var string
     *
     * @OGM\Property(type="string")
     */
    protected $tagline;

    /**
     * @var int
     *
     * @OGM\Property(type="int")
     */
    protected $released;

    /**
     * @var Person[]|Collection
     *
     * @OGM\Relationship(type="ACTED_IN", direction="INCOMING", collection=true, mappedBy="movies", targetEntity="Person")
     */
    protected $actors;

    public function __construct()
    {
        $this->actors = new Collection();
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
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getTagline()
    {
        return $this->tagline;
    }

    /**
     * @param string $tagline
     */
    public function setTagline($tagline)
    {
        $this->tagline = $tagline;
    }

    /**
     * @return int
     */
    public function getReleased()
    {
        return $this->released;
    }

    /**
     * @param int $released
     */
    public function setReleased($released)
    {
        $this->released = $released;
    }

    /**
     * @return Person[]|Collection
     */
    public function getActors()
    {
        return $this->actors;
    }
}