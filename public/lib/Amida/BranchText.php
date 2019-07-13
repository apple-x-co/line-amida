<?php


namespace Amida;


class BranchText implements BranchInterface
{
    /** @var array */
    private $data;

    /** @var Collection */
    private $triggers;

    /**
     * Branch constructor.
     *
     * @param array $data
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * @return Collection|TriggerInterface[]
     */
    public function getTriggers()
    {
        return $this->triggers;
    }

    /**
     * @param Collection|TriggerInterface[] $triggers
     */
    public function setTriggers($triggers)
    {
        $this->triggers = $triggers;
    }

    public function __debugInfo()
    {
        return [
            'to'       => $this->data['to'],
            'type'     => $this->data['type'],
            'text'     => $this->data['text'],
            'triggers' => $this->triggers
        ];
    }
}