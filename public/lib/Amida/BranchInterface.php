<?php


namespace Amida;


interface BranchInterface
{
    /**
     * @return string
     */
    public function getTo();

    /**
     * @return string
     */
    public function getLabel();

    /**
     * @return string
     */
    public function getText();

    /**
     * @return Collection|TriggerInterface[]
     */
    public function getTriggers();

    /**
     * @param Collection|TriggerInterface[] $triggers
     */
    public function setTriggers($triggers);
}