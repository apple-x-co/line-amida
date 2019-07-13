<?php


namespace Amida;


interface BranchInterface
{
    /**
     * @param ContentInterface[] $triggers
     */
    public function setTriggers($triggers);
}