<?php


namespace Amida;


class ContentText implements ContentInterface
{
    /** @var string */
    private $text;

    /**
     * ContentText constructor.
     *
     * @param string $text
     */
    public function __construct($text)
    {
        $this->text = $text;
    }

    /**
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }
}