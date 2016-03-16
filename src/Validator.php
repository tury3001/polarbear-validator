<?php

namespace PolarBear\PolarValidator;

/**
 * Interface Validator
 *
 * Every specific validator must implement this Interface
 *
 * @todo Max for numbers
 * @todo Min for numbers
 * @todo url
 * @todo OnlyLetters
 * @todo OnlyLettersWithSpaces
 * @todo OnlyLettersAndPunctuation
 * @todo OnlyLettersNumbersAndPunctuation
 * @todo OnlyAlphaNumeric
 * @todo DNI for argentinean unique national document
 * @todo CUIT
 * @todo HexadecimalColor
 *
 *
 * @author Alejandro A. De Luca <adeluca@polarbear.com.ar>
 * @package PolarBear\PolarValidator
 */
interface Validator
{
    /**
     * Method to override
     * @param $value string|int|float  Value to validate
     * @return bool
     */
    public function validate($value);
}