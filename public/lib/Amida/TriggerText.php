<?php


namespace Amida;


class TriggerText implements TriggerInterface
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
     * @param TriggerInterface $trigger
     *
     * @return boolean
     */
    public function equalTo($trigger)
    {
        return ($trigger instanceof static) && $this->getText() === $trigger->getText();
    }

    /**
     * @param $text
     *
     * @return $this
     */
    public static function text($text)
    {
        return new static([
            'type' => 'text',
            'text' => $text
        ]);
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