<?php

namespace PolarBear\PolarValidator\Validators;

use PolarBear\PolarValidator\Validator;

/**
 * class LeapYear
 *
 * @author Alejandro A. De Luca <tury3001@gmail.com>
 * @link https://en.wikipedia.org/wiki/Leap_year
 */
class LeapYear implements Validator
{

    /**
     * Validate a leap year
     *
     * @param $value string|int|float  Value to validate
     *
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