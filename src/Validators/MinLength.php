<?php

namespace PolarBear\PolarValidator\Validators;

use PolarBear\PolarValidator\Validator;


/**
 * class MinLength
 *
 * Validates if a string length is smaller than a value passed to the constructor

 * @author Alejandro A. De Luca <adeluca@polarbear.com.ar>
 * @package PolarBear\PolarValidator
 */
class MinLength implements Validator
{
    private $minLength;

    /**
     * Constructor
     *
     * @param int $min minimum allowed length
     */
    public function __construct($min)
    {
        $this->minLength = $min;
    }

    /**
     * Method to override
     *
     * @param $value string  Texto to validate
     * @return bool
     */
    public function validate($value)
    {
        $stringLength = strlen($value);

        if ($stringLength >= $this->minLength)
            return true;
        else
            return false;
    }
}