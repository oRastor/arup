<?php

namespace AutoGrabber\QueryOptions;

class CategoryOption extends AbstractOption
{

    const ALL_AUTOMATIC = -1;
    const ANY = 0;
    const MECHANICS = 1;
    const AUTOMATIC = 2;
    const TIPTRONIC = 3;
    const ADAPTIVE = 4;
    const VARIATOR = 5;

    protected static $allowedValues = array(self::ALL_AUTOMATIC, self::ANY, self::MECHANICS, self::AUTOMATIC, self::TIPTRONIC, self::ADAPTIVE, self::VARIATOR);
    protected $type = self::TYPE_ENUM;
    protected $queryOptionName = 'gearbox';

    public function setValue($value)
    {
        if (!in_array($value, self::$allowedValues)) {
            throw new Exception("Invalid value for gearbox!");
        }
        
        parent::setValue($value);
    }

}