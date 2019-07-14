<?php


namespace Amida;


interface PersistenceInterface
{
    /**
     * @return bool
     */
    public function exists();

    /**
     * @param mixed $object
     *
     * @return int
     */
    public function save($object);

    /**
     * @param string $class
     *
     * @return mixed
     */
    public function fetch($class);
}