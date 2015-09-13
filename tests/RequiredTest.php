<?php

use PolarBear\PolarValidator\Input;
use PolarBear\PolarValidator\Validators\Required;

class RequiredTest extends PHPUnit_Framework_TestCase
{
    /**
     * Test with non null values
     * @param $value string|int|float|bool Value to test
     * @dataProvider nonNullValues
     */
    public function testNonNullValues($value)
    {
        $input = new Input($value);
        $requiredValidator = new Required();
        $input->attach($requiredValidator);
        $valid = $input->isValid();
        $this->assertTrue($valid);
    }

    /**
     * Test with number zero
     *
     */
    public function testZeroValue()
    {
        $input = new Input(0);
        $requiredValidator = new Required();
        $input->attach($requiredValidator);
        $valid = $input->isValid();
        $this->assertTrue($valid);
    }

    /**
     * Test empty string
     *
     */
    public function testEmptyStringValue()
    {
        $input = new Input("");
        $requiredValidator = new Required();
        $input->attach($requiredValidator);
        $valid = $input->isValid();
        $this->assertTrue($valid);
    }

    /**
     * Test null value
     *
     */
    public function testNullValue()
    {
        $input = new Input(null);
        $requiredValidator = new Required();
        $input->attach($requiredValidator);
        $valid = $input->isValid();
        $this->assertFalse($valid);
    }


    /**
     * Data Provider for non null values test
     *
     * @return array
     */
    public function nonNullValues()
    {
        return array(
            array('123122'),
            array("Lorem ipsum"),
            array(7845.25),
            array(5698),
            array(0x4879)
        );
    }
}