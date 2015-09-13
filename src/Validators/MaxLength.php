<?php

namespace PolarBear\PolarValidator\Validators;

use PolarBear\PolarValidator\Validator;


/**
 * class MaxLength
 *
 * Validates if a string length is greater than a value passed to the constructor
 *
 * @author Alejandro A. De Luca <tury3001@gmail.com>
 * @package PolarBear\PolarValidator
 */
class MaxLength implements Validator
{
    private $maxLength;

    /**
     * Constructor
     * @param int $max maximum allowed length
     */
    public function __construct($max)
    {
        $this->maxLength = $max;
    }

    /**
     * Method to override
     * @param $value string  Texto to validate
     * @return bool
     */
    public function validate($value)
    {
        $stringLength = strlen($value);

        if ($stringLength > $this->maxLength)
            return false;
        else
            return true;
    }
}