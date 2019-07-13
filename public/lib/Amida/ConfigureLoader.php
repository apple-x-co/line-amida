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

                if (isset($array_node['branches'])) {
                    /** @var BranchInterface[] $branches */
                    $branches = [];
                    $array_branches = $array_node['branches'];
                    foreach ($array_branches as $array_branch) {
                        /** @var BranchInterface $branch */
                        $branch = BranchConfigureLoader::load($array_branch);

                        $triggers  = [];
                        $array_triggers = $array_branch['triggers'];
                        foreach ($array_triggers as $array_trigger) {

                        }

                        $branch->setTriggers($triggers);

                        $branches[] = $branch;
                    }
                    $node->setBranches($branches);}


                /** @var ContentInterface $content */
                $content = null;
                $array_content = $array_node['content'];
                if (isset($array_content['class'])) {
                    $class = $array_content['class'];
                    if ( ! class_exists($class)) {
                        continue;
                    }
                    $content = new $class($array_content);
                } else {
                    $content = ContentConfigureLoader::load($array_content);
                }
                $node->setContent($content);

                $nodes[] = $node;
            }

            $configure = new Configure($nodes);
        }

        return $configure;
    }
}