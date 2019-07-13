<?php


namespace Amida;


class BranchConfigureLoader
{
    /**
     * @return ContentInterface|null
     */
    public static function load($data)
    {
        $class_map = [
            'text' => '\Amida\BranchText',
            'image' => '\Amida\BranchImage',
        ];

        if ( ! isset($class_map[$data['type']])) {
            return null;
        }

        $class = $class_map[$data['type']];

        return new $class($data);
    }
}