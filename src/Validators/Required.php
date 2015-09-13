<?php

namespace PolarBear\PolarValidator\Validators;

use PolarBear\PolarValidator\Validator;

/**
 * class Required
 *
 * @author Alejandro A. De Luca <tury3001@gmail.com>
 */
class Required implements Validator
{

    /**
     * Method to override
     *
     * @param $value string|int|float  Value to validate
     * @return bool
     */
    public function validate($value)
    {
        if ($value === null)
            return false;
        else
            return true;
    }
}