<?php


namespace Amida;


class ContentText implements ContentInterface
{
    /** @var array */
    private $data;

    /**
     * ContentText constructor.
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
    public function getText()
    {
        return $this->data['text'];
    }

    public function __debugInfo()
    {
        return [
            'type' => $this->data['type'],
            'text' => $this->data['text']
        ];
    }
}