<?php

namespace Amida;


class Configure
{
    /** @var NodeInterface[] */
    private $nodes;

    /**
     * Configure constructor.
     *
     * @param NodeInterface[] $nodes
     */
    public function __construct(array $nodes)
    {
        $this->nodes = $nodes;
    }
}