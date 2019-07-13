<?php


namespace Amida;


interface BranchInterface
{
    /**
     * @return Collection|TriggerInterface[]
     */
    public function getTriggers();

    /**
     * @param Collection|TriggerInterface[] $triggers
     */
    public function setTriggers($triggers);
}