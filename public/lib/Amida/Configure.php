<?php

namespace Amida;


class Configure
{
    /** @var Collection|NodeInterface[] */
    private $nodes;

    /**
     * Configure constructor.
     *
     * @param Collection|NodeInterface[] $nodes
     */
    public function __construct($nodes)
    {
        $this->nodes = $nodes;
    }

    /**
     * @return Collection|NodeInterface[]
     */
    public function getNodes()
    {
        return $this->nodes;
    }
}