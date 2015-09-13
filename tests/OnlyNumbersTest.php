<?php

use PolarBear\PolarValidator\Validators\OnlyNumbers;
use PolarBear\PolarValidator\Input;

/**
 * class OnlyNumbersTest
 *
 * @author Alejandro A. De Luca <tury3001@gmail.com>
 */
class OnlyNumbersTest extends PHPUnit_Framework_TestCase
{
    /**
     * Test strings with only digits
     */
    public function testStringOnlyNumbersOk()
    {
        $numbers = "4563823";

        $input = new Input($numbers);

        $onlyNumbersValidator = new OnlyNumbers();
        $input->attach($onlyNumbersValidator);
        $result = $input->isValid();

        $this->assertTrue($result);
    }

    /**
     * Test strings with not only digits
     *
     * @param $chars array Values to test
     * @dataProvider notOnlyNumbers
     */
    public function testStringWithNotOnlyNumbers($chars)
    {
        $input = new Input($chars);
        $onlyNumbersValidator = new OnlyNumbers();

        $input->attach($onlyNumbersValidator);
        $result = $input->isValid();

        $this->assertFalse($result);
    }

    /**
     * Test string digits with dots
     */
    public function testStringNumberWithDots()
    {
        $chars = "8123.2139";
        $input = new Input($chars);
        $onlyNumbersValidator = new OnlyNumbers();

        $input->attach($onlyNumbersValidator);
        $result = $input->isValid();

        $this->assertFalse($result);
    }

    /**
     * Test integer number
     */
    public function testInteger()
    {
        $integer = 486879;
        $input = new Input($integer);
        $onlyNumbersValidator = new OnlyNumbers();

        $input->attach($onlyNumbersValidator);
        $result = $input->isValid();

        $this->assertTrue($result);
    }

    /**
     * Test float number
     */
    public function testFloat()
    {
        $float = 0.34123;
        $input = new Input($float);
        $onlyNumbersValidator = new OnlyNumbers();

        $input->attach($onlyNumbersValidator);
        $result = $input->isValid();

        $this->assertFalse($result);
    }

    /**
     * Test hexadecimal representation
     */
    public function testHexa()
    {
        $hexa = 0x5796; // is an integer after all
        $input = new Input($hexa);
        $onlyNumbersValidator = new OnlyNumbers();
        $input->attach($onlyNumbersValidator);
        $result = $input->isValid();

        $this->assertTrue($result);
    }

    public function testEmptyString()
    {
        $empty = "";
        $input = new Input($empty);
        $onlyNumbersValidator = new OnlyNumbers();
        $input->attach($onlyNumbersValidator);
        $result = $input->isValid();

        $this->assertTrue($result);
    }

    public function testNullValue()
    {
        $empty = null;
        $input = new Input($empty);
        $onlyNumbersValidator = new OnlyNumbers();
        $input->attach($onlyNumbersValidator);
        $result = $input->isValid();

        $this->assertTrue($result);
    }

    /**
     * Data Provider for testStringWithNotOnlyNumbers
     * @return array
     */
    public function notOnlyNumbers()
    {
        return array(
            array("879s89789b"),
            array("k123123;"),
            array("289=121233"),
            array("().,-¡¿"),
            array("test string"),
        );
    }
}
