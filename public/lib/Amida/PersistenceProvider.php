<?php


namespace Amida;


class PersistenceProvider implements PersistenceInterface
{
    /** @var PersistenceInterface */
    private $persistence;

    /**
     * PersistenceProvider constructor.
     *
     * @param PersistenceInterface $persistence
     */
    public function __construct($persistence)
    {
        $this->persistence = $persistence;
    }

    public function exists()
    {
        return $this->persistence->exists();
    }

    public function save($object)
    {
        return $this->persistence->save($object);
    }

    public function fetch($class)
    {
        return $this->persistence->fetch($class);
    }
}