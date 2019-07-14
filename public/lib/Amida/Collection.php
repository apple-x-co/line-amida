<?php


namespace Amida;


use LimitIterator;
use Traversable;

class Collection implements \IteratorAggregate
{
    private $array = [];

    /**
     * Collection constructor.
     *
     * @param $array
     *
     * @see https://book.cakephp.org/3.0/ja/core-libraries/collections.html
     */
    public function __construct($array = [])
    {
        $this->array = $array;
    }

    /**
     * @return array
     */
    public function __debugInfo()
    {
        return $this->array;
    }

    /**
     * @return bool
     */
    public function isEmpty()
    {
        return empty($this->array);
    }

    /**
     * @param mixed $data
     */
    public function append($data)
    {
        $this->array[] = $data;
    }

    /**
     * @return mixed|null
     */
    public function first()
    {
        $iterator = new LimitIterator(new \ArrayIterator($this->array), 0, 1);
        foreach ($iterator as $result) {
            return $result;
        }

        return null;
    }

    /**
     * @return mixed|null
     */
    public function last()
    {
        $iterator = new LimitIterator(new \ArrayIterator($this->array), count($this->array) - 1, 1);
        foreach ($iterator as $result) {
            return $result;
        }

        return null;
    }

    /**
     * @param array $conditions
     *
     * @return mixed|null
     */
    public function firstMatch($conditions)
    {
        $matchers = [];
        foreach ($conditions as $property => $property_value) {
            $matchers[] = function ($value) use ($property, $property_value) {
                if ((is_array($value) || $value instanceof \ArrayAccess) &&
                    $value[$property] === $property_value) {
                    return true;
                }

                if (is_object($value) &&
                    property_exists($value, $property) &&
                    $value->$property === $property_value) {
                    return true;
                }

                return false;
            };
        }

        foreach ($this->array as $item) {
            foreach ($matchers as $matcher) {
                if ( ! $matcher($item)) {
                    continue 2;
                }
            }
            return $item;
        }

        return null;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return $this->array;
    }

    /**
     * Retrieve an external iterator
     * @link https://php.net/manual/en/iteratoraggregate.getiterator.php
     * @return Traversable An instance of an object implementing <b>Iterator</b> or
     * <b>Traversable</b>
     * @since 5.0.0
     */
    public function getIterator()
    {
        return new \ArrayIterator($this->array);
    }
}