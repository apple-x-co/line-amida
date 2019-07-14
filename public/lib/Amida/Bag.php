<?php


namespace Amida;


class Bag
{
    /** @var Collection */
    private $nodes;

    /**
     * @param $node
     */
    public function addNode($node)
    {
        $this->nodes->append($node);
    }

    /**
     * @return Collection
     */
    public function getNodes()
    {
        return $this->nodes;
    }
}