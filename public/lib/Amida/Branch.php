<?php


namespace Amida;


class Branch
{
    /** @var string */
    private $id;

    /** @var ContentInterface[] */
    private $triggers;

    /**
     * Branch constructor.
     *
     * @param string $id
     * @param ContentInterface[] $triggers
     */
    public function __construct($id, $triggers)
    {
        $this->id = $id;
        $this->triggers = $triggers;
    }
}