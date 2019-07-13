<?php


namespace Amida;


class Collection
{
    public $array = [];

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

    public function isEmpty()
    {
        return empty($this->array);
    }

    public function append($data)
    {
        $this->array[] = $data;
    }
}