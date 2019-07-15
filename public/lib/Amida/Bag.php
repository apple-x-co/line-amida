<?php


namespace Amida;


class Bag implements \Serializable
{
    /** @var Collection */
    private $nodes;

    /** @var int */
    private $expiration;

    public function __construct()
    {
        $this->nodes = new Collection();
        $this->expiration = null;
    }

    /**
     *
     */
    public function clear()
    {
        $this->clearNodes();
        $this->setExpiration(null);
    }

    /**
     * @return bool
     */
    public function hasNodes()
    {
        return ! $this->nodes->isEmpty();
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
     * @return void
     */
    public function clearNodes()
    {
        $this->nodes = new Collection();
    }

    /**
     * @param int $expiration
     */
    public function setExpiration($expiration)
    {
        $this->expiration = $expiration;
    }

    /**
     * @return int
     */
    public function getExpiration()
    {
        return $this->expiration;
    }

    /**
     *
     */
    public function isExpires()
    {
        return $this->expiration !== null && $this->expiration < time();
    }

    /**
     * String representation of object
     * @link https://php.net/manual/en/serializable.serialize.php
     * @return string the string representation of the object or null
     * @since 5.1.0
     */
    public function serialize()
    {
        return serialize([
            'nodes'      => $this->nodes,
            'expiration' => $this->expiration
        ]);
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
        $unserialized = unserialize($serialized);
        if (is_array($unserialized) && isset($unserialized['nodes'])) {
            $this->nodes = $unserialized['nodes'];
        }
        if (is_array($unserialized) && isset($unserialized['nodes'])) {
            $this->expiration = $unserialized['expiration'];
        }
    }
}