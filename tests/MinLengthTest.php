<?php

use PolarBear\PolarValidator\Validators\MinLength;
use PolarBear\PolarValidator\Input;

/**
 * Class MinLengthTest
 *
 * @author Alejandro A. De Luca <adeluca@polarbear.com.ar>
 */
class MinLengthTest extends PHPUnit_Framework_TestCase
{
    /**
     * Test string with more characters
     *
     */
    public function testStringWithLessLength()
    {
        $string = "Lorem ipsum dolor sit amet"; // 26 chars
        $input = new Input($string);

        $maxLengthValidator = new MinLength(30);

        $input->attach($maxLengthValidator);

        $isValid = $input->isValid();

        $this->assertFalse($isValid);
    }

    /**
     * Test strings with more characters
     *
     */
    public function testStringWithMoreLength()
    {
        $string = "Lorem ipsum dolor"; // 17 chars
        $input = new Input($string);

        $maxLengthValidator = new MinLength(8);

        $input->attach($maxLengthValidator);
        $isValid = $input->isValid();

        $this->assertTrue($isValid);
    }

    /**
     * Test equal length
     */
    public function testEqualLength()
    {
        $string = "Lorem ipsum dolor"; // 17 chars
        $input = new Input($string);

        $maxLengthValidator = new MinLength(17);

        $input->attach($maxLengthValidator);
        $isValid = $input->isValid();

        $this->assertTrue($isValid);
    }

    /**
     * Test empty string
     *
     */
    public function testZeroLengthValue()
    {
        $emptyString = ""; // 0 chars
        $input = new Input($emptyString);

        $maxLengthValidator = new MinLength(5);

        $input->attach($maxLengthValidator);
        $isValid = $input->isValid();

        $this->assertFalse($isValid);
    }

    /**
     * Test 0 minimum accepted
     *
     */
    public function testZeroMinimumLengthValue()
    {
        $emptyString = ""; // 0 chars
        $input = new Input($emptyString);

        $maxLengthValidator = new MinLength(0);

        $input->attach($maxLengthValidator);
        $isValid = $input->isValid();

        $this->assertTrue($isValid);
    }
}
