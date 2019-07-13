<?php


namespace Amida;


class Node implements NodeInterface
{
    /** @var array */
    private $data;

    /** @var ContentInterface */
    private $content;

    /** @var NodeInterface[] */
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
        // TODO: Implement hasNext() method.
    }

    /**
     * @return Branch[]
     */
    public function getBranches()
    {
        // TODO: Implement getNextNodes() method.
    }

    /**
     * @param Branch $branches
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
        // TODO: Implement getContent() method.
    }

    /**
     * @param ContentInterface $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    public function __debugInfo()
    {
        return [
            'id'       => $this->data['id'],
            'content'  => $this->content,
            'branches' => $this->branches
        ];
    }
}