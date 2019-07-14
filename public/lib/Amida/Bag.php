<?php


namespace Amida;


class Bag implements \Serializable
{
    /** @var Collection */
    private $nodes;

    public function __construct()
    {
        $this->nodes = new Collection();
    }

    /**
     * @param NodeInterface $node
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

    /**
     * String representation of object
     * @link https://php.net/manual/en/serializable.serialize.php
     * @return string the string representation of the object or null
     * @since 5.1.0
     */
    public function serialize()
    {
        return serialize($this->nodes);
    }

    /**
     * Constructs the object
     * @link https://php.net/manual/en/serializable.unserialize.php
     *
     * @param string $serialized <p>
     * The string representation of the object.
     * </p>
     *
     * @return void
     * @since 5.1.0
     */
    public function unserialize($serialized)
    {
        $this->nodes = unserialize($serialized);
    }
}