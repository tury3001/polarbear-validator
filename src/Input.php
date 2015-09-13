<?php

namespace PolarBear\PolarValidator;

/**
 * class Input
 *
 * @author Alejandro A. De Luca <adeluca@polarbear.com.ar>
 * @package PolarBear\PolarValidator
 */
class Input implements InputValidate
{
    /**
     * @var string|int|float Actual value from input
     */
    private $value;

    /**
     * @var Validator[] attached
     */
    private $validators;

    public function __construct($value)
    {
        $this->value = $value;
        $this->validators = array();
    }

    /**
     * Returns if the input is valid or not
     *
     * @return bool
     */
    public function isValid()
    {
        $valid = true;

        foreach ($this->validators as $validator) {
            $valid = $validator->validate($this->value);
        }

        return $valid;
    }

    /**
     * Return the text errors associated to the validation process
     *
     * @return mixed
     */
    public function getErrors()
    {
        // TODO: Implement getErrors() method.
    }

    /**
     * Attach a Validator object
     *
     * @param Validator $validator
     */
    public function attach(Validator $validator)
    {
        $this->validators[] = $validator;
    }
}