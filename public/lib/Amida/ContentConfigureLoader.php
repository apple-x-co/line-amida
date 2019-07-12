<?php


namespace Amida;


class ContentConfigureLoader
{
    /**
     * @return ContentInterface|null
     */
    public static function load($data)
    {
        $class_map = [
            'text' => '\Amida\ContentText',
            'image' => '\Amida\ContentImage',
        ];

        if ( ! isset($class_map[$data['type']])) {
            return null;
        }

        $class = $class_map[$data['type']];

        return new $class($data);
    }
}