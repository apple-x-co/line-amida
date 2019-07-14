<?php


namespace Amida;


class Persistence
{
    private $file_path;

    /**
     * Persistence constructor.
     *
     * @param $file_path
     */
    public function __construct($file_path)
    {
        $this->file_path = $file_path;
    }

    /**
     * @return bool
     */
    public function exists()
    {
        return file_exists($this->file_path);
    }

    /**
     * @param mixed $object
     *
     * @return int
     */
    public function save($object)
    {
        $result = file_put_contents($this->file_path, serialize($object));

        return $result === false ? 0 : $result;
    }

    /**
     * @param string $class
     *
     * @return mixed
     */
    public function fetch($class)
    {
        return unserialize(file_get_contents($this->file_path), ['allowed_classes' => [$class]]);
    }
}