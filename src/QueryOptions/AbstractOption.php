<?php

namespace AutoGrabber\QueryOptions;

/**
 * Description of AbstractOption
 *
 * @author root
 */
class AbstractOption
{

    protected $type;
    protected $value;
    protected $queryOptionName;

    const TYPE_INT = 0;
    const TYPE_STRING = 1;
    const TYPE_ENUM = 2;

    public function __construct($value)
    {
        $this->setValue($value);
    }


    public function getType()
    {
        return $this->type;
    }

    public function setValue($value)
    {
        $this->value = $value;
    }

    public function getQueryOptionName()
    {
        return $this->queryOptionName;
    }

    public function getQueryOptionValue()
    {
        return $this->value;
    }

}
