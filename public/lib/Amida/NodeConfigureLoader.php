<?php


namespace Amida;


class NodeConfigureLoader
{
    /**
     * @param array $data
     *
     * @return NodeInterface
     */
    public static function load($data)
    {
        return new Node($data);
    }
}