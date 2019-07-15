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

    /**
     * @return bool
     */
    public function exists()
    {
        return $this->persistence->exists();
    }

    /**
     * @param mixed $object
     *
     * @return int
     */
    public function save($object)
    {
        return $this->persistence->save($object);
    }

    /**
     * @param string $class
     *
     * @return mixed
     */
    public function fetch($class)
    {
        return $this->persistence->fetch($class);
    }
}