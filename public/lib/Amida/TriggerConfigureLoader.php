<?php


namespace Amida;


class TriggerConfigureLoader
{
    /**
     * @return TriggerInterface|null
     */
    public static function load($data)
    {
        $class_map = [
            'text' => '\Amida\TriggerText',
            'image' => '\Amida\TriggerImage',
        ];

        if ( ! isset($class_map[$data['type']])) {
            return null;
        }

        $class = $class_map[$data['type']];

        return new $class($data);
    }
}