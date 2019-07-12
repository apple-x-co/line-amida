<?php

namespace Amida;


use function Composer\Autoload\includeFile;

class ConfigureLoader
{
    /**
     * @param string $file_path
     *
     * @return Configure
     */
    public static function load($file_path)
    {
        static $configure = null;

        if ($configure === null) {
            $array = include $file_path;

            $nodes = [];
            foreach ($array as $array_node) {
                /** @var NodeInterface $node */
                $node = null;

                if (isset($array_node['class'])) {
                    $class = $array_node['class'];
                    if ( ! class_exists($class)) {
                        continue;
                    }
                    $node = new $class($array_node);
                } else {
                    $node = NodeConfigureLoader::load($array_node);
                }

                /** @var Branch[] $branches */
                $branches = [];
                $node->setBranches($branches);

                /** @var ContentInterface $content */
                $content = null;
                $node->setContent($content);

                $nodes[] = $node;
            }

            $configure = new Configure($nodes);
        }

        return $configure;
    }
}