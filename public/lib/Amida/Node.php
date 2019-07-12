<?php


namespace Amida;


class Node implements NodeInterface
{
    /** @var string */
    private $id;

    /** @var NodeInterface[] */
    private $branches;

    /** @var ContentInterface */
    private $content;

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId($id)
    {
        $this->id = $id;
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
}