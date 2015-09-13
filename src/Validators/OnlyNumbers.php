<?php

namespace PolarBear\PolarValidator\Validators;

use PolarBear\PolarValidator\Validator;

/**
 * class OnlyNumbers
 *
 * This class validates if a given parameter has only digits.
 * Strings with digits are Ok.
 * Integers are also Ok.
 *
 * @author Alejandro A. De Luca <tury3001@gmail.com>
 */
class OnlyNumbers implements Validator
{

    /**
     * Method to override
     * @param $value string|int|float  Value to validate
     * @return bool
     */
    public function validate($value)
    {
        if ($value == "" || $value == null)
            $result = true;
        elseif (is_string($value))
            $result = ctype_digit($value);
        elseif (is_int($value))
            $result = true;
        else
            $result = false;

        return $result;
    }
}