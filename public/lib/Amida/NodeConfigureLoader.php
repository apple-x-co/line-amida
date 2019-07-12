<?php


namespace Amida;


class NodeConfigureLoader
{
    /**
     * @return NodeInterface
     */
    public static function load($data)
    {
        $node = new Node();
        $node->setId($data['id']);

        return $node;
    }
}