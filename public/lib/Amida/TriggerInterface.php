<?php

namespace Amida;


interface TriggerInterface
{
    /**
     * @param TriggerInterface $trigger
     *
     * @return boolean
     */
    public function equalTo($trigger);
}