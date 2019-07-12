<?php

namespace Amida;


interface NodeInterface
{
    /**
     * @return string
     */
    public function getId();

    /**
     * @return boolean
     */
    public function hasBranch();

    /**
     * @return Branch[]
     */
    public function getBranches();

    /**
     * @param  Branch[] $branches
     */
    public function setBranches($branches);

    /**
     * @return ContentInterface
     */
    public function getContent();

    /**
     * @param ContentInterface $content
     */
    public function setContent($content);
}