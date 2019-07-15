<?php


namespace Amida;


class Node implements NodeInterface, \ArrayAccess
{
    /** @var array */
    private $data;

    /** @var ContentInterface */
    private $content;

    /** @var Collection|BranchInterface[] */
    private $branches;

    /**
     * Node constructor.
     *
     * @param $data
     */
    public function __construct($data)
    {
        $this->data = $data;
        $this->content = null;
        $this->branches = [];
    }

    /**
     * @return bool
     */
    public function isRoot()
    {
        return isset($this->data['root']);
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->data['id'];
    }

    /**
     * @return boolean
     */
    public function hasBranch()
    {
        return ! empty($this->branches);
    }

    /**
     * @return Collection|BranchInterface[]
     */
    public function getBranches()
    {
        return $this->branches;
    }

    /**
     * @param Collection|BranchInterface[] $branches
     */
    public function setBranches($branches)
    {
        $this->branches = $branches;
    }

    /**
     * @return ContentInterface
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param ContentInterface $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * @return NodeCallbackInterface|null
     */
    public function getCallback()
    {
        $class = $this->data['callback'];
        if ($class === null || $class === '') {
            return null;
        }
        if ( ! class_exists($class)) {
            return null;
        }
        $instance = new $class();
        if ( ! ($instance instanceof NodeCallbackInterface)) {
            return null;
        }

        return $instance;
    }

    public function __debugInfo()
    {
        return [
            'id'       => $this->data['id'],
            'content'  => $this->content,
            'branches' => $this->branches
        ];
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
}