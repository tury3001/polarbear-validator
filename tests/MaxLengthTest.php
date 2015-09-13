<?php

use PolarBear\PolarValidator\Input;
use PolarBear\PolarValidator\Validators\MaxLength;

/**
 * Class MaxLengthTest
 *
 * Testing class for MaxLength
 *
 * @author Alejandro A. De Luca <adeluca@polarbear.com.ar>
 * @see PolarBear\PolarValidator\Validators\MaxLength
 */
class MaxLengthTest extends PHPUnit_Framework_TestCase
{

    /**
     * Test string with less characters
     *
     */
    public function testStringWithLessLength()
    {
        $string = "Lorem ipsum dolor sit amet"; // 26 chars
        $input = new Input($string);

        $maxLengthValidator = new MaxLength(50);

        $input->attach($maxLengthValidator);

        $isValid = $input->isValid();

        $this->assertTrue($isValid);
    }

    /**
     * Test strings with more characters
     *
     */
    public function testStringWithMoreLength()
    {
        $string = "Lorem ipsum dolor"; // 17 chars
        $input = new Input($string);

        $maxLengthValidator = new MaxLength(8);

        $input->attach($maxLengthValidator);
        $isValid = $input->isValid();

        $this->assertFalse($isValid);
    }

    /**
     * Test equal length
     */
    public function testEqualLength()
    {
        $string = "Lorem ipsum dolor"; // 17 chars
        $input = new Input($string);

        $maxLengthValidator = new MaxLength(17);

        $input->attach($maxLengthValidator);
        $isValid = $input->isValid();

        $this->assertTrue($isValid);
    }

    /**
     * Test empty string
     */
    public function testZeroLengthValue()
    {
        $emptyString = ""; // 0 chars
        $input = new Input($emptyString);

        $maxLengthValidator = new MaxLength(5);

        $input->attach($maxLengthValidator);
        $isValid = $input->isValid();

        $this->assertTrue($isValid);
    }
}