<?php


namespace Amida;


interface NodeCallbackInterface
{
    /**
     * @param NodeInterface $node
     * @param Bag $bag
     *
     * @return mixed
     */
    public function call($node, $bag);
}