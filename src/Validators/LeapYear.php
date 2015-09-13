<?php

namespace PolarBear\PolarValidator\Validators;

use PolarBear\PolarValidator\Validator;

/**
 * class isLeapYear
 *
 * @author Alejandro A. De Luca <tury3001@gmail.com>
 */
class LeapYear implements Validator
{

    /**
     * Method to override
     * @param $value string|int|float  Value to validate
     * @return bool
     */
    public function validate($value)
    {
        if ($value && (is_int($value) || (is_string($value) && ctype_digit($value)))) {

            $value = (int) $value;

            if ((($value % 4 == 0) && !($value % 100 == 0)) || (($value % 100 == 0) && ($value % 400 == 0))) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}