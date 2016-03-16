<?php

namespace PolarBear\PolarValidator\Validators;

use PolarBear\PolarValidator\Validator;

/**
 * class Email
 *
 * @author Alejandro A. De Luca <tury3001@gmail.com>
 */
class Email implements Validator
{

    /**
     * Validate email method
     *
     * @param $value string  Value to validate
     * @return bool
     */
    public function validate($value)
    {
       if (filter_var($value, FILTER_VALIDATE_EMAIL))
            return true;
        else
            return false;
    }
}