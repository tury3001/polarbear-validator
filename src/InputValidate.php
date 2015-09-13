<?php


namespace PolarBear\PolarValidator;

/**
 * Interface InputValidate
 *
 * All inputs to validate should implement this interface
 *
 * @author Alejandro A. De Luca <adeluca@polarbear.com.ar>
 * @package PolarBear\PolarValidator
 */
interface InputValidate
{

    /**
     * Returns if the input is valid or not
     *
     * @return bool
     */
    public function isValid();

    /**
     * Return the text errors associated to the validation process
     *
     * @return mixed
     */
    public function getErrors();

    /**
     * Attach a Validator object
     *
     * @param Validator $validator
     */
    public function attach(Validator $validator);
}