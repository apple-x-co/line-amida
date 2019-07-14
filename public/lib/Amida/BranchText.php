<?php


namespace Amida;


class BranchText implements BranchInterface, \ArrayAccess
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
     * @return string
     */
    public function getTo()
    {
        return $this->data['to'];
    }

    /**
     * @return string
     */
    public function getLabel()
    {
        return $this->data['label'];
    }

    /**
     * @return string
     */
    public function getText()
    {
        return $this->data['text'];
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

    /**
     * Whether a offset exists
     * @link https://php.net/manual/en/arrayaccess.offsetexists.php
     *
     * @param mixed $offset <p>
     * An offset to check for.
     * </p>
     *
     * @return boolean true on success or false on failure.
     * </p>
     * <p>
     * The return value will be casted to boolean if non-boolean was returned.
     * @since 5.0.0
     */
    public function offsetExists($offset)
    {
        return isset($this->data[$offset]);
    }

    /**
     * Offset to retrieve
     * @link https://php.net/manual/en/arrayaccess.offsetget.php
     *
     * @param mixed $offset <p>
     * The offset to retrieve.
     * </p>
     *
     * @return mixed Can return all value types.
     * @since 5.0.0
     */
    public function offsetGet($offset)
    {
        return $this->offsetExists($offset) ? $this->data[$offset] : null;
    }

    /**
     * Offset to set
     * @link https://php.net/manual/en/arrayaccess.offsetset.php
     *
     * @param mixed $offset <p>
     * The offset to assign the value to.
     * </p>
     * @param mixed $value <p>
     * The value to set.
     * </p>
     *
     * @return void
     * @since 5.0.0
     */
    public function offsetSet($offset, $value)
    {
        $this->data[$offset] = $value;
    }

    /**
     * Offset to unset
     * @link https://php.net/manual/en/arrayaccess.offsetunset.php
     *
     * @param mixed $offset <p>
     * The offset to unset.
     * </p>
     *
     * @return void
     * @since 5.0.0
     */
    public function offsetUnset($offset)
    {
        unset($this->data[$offset]);
    }

    public function __debugInfo()
    {
        return [
            'to'       => $this->data['to'],
            'type'     => $this->data['type'],
            'text'     => $this->data['text'],
            'label'    => $this->data['label'],
            'triggers' => $this->triggers
        ];
    }
}