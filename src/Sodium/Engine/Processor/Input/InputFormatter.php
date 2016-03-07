<?php

namespace Sodium\Engine\Processor\Input;

class InputFormatter
{
    protected $rawInput;
    protected $formats = array();

    public static function init($rawInput, $formats = array())
    {
        return new self($rawInput, $formats);
    }

    public function __construct($rawInput, array $formats)
    {
        $this->rawInput = $rawInput;
        $this->formats = $formats;
    }

    /**
     * Get formats.
     *
     * @return array
     */
    public function getFormats()
    {
        return $this->formats;
    }

    /**
     * Set formats.
     *
     * @param array $formats
     *
     * @return InputFormatter
     */
    public function setFormats(array $formats)
    {
        $this->formats = $formats;

        return $this;
    }

    public function format()
    {
        foreach ($this->formats as $type) {
            if ($type::isAcceptedFormat($this->rawInput)) {
                $format = new $type();
                $format->setFormats($this->getFormats());

                return $format->getFormattedInput($this->rawInput);
            }
        }
    }
}
