<?php

use PolarBear\PolarValidator\Input;
use PolarBear\PolarValidator\Validators\LeapYear;

/**
 * class LeapYearTest
 *
 * @author Alejandro A. De Luca <adeluca@polarbear.com.ar>
 */
class LeapYearTest extends PHPUnit_Framework_TestCase
{
    /**
     * Test leap years
     * @param array int Array of years to test
     * @dataProvider leapYears
     */
    public function testLeapYears($year)
    {
        $input = new Input($year);

        $leapYearValidator = new LeapYear();

        $input->attach($leapYearValidator);
        $isValid = $input->isValid();

        $this->assertTrue($isValid);
    }

    /**
     * Test not leap years
     *
     * @param array int Array of years to test
     * @dataProvider notLeapYears
     */
    public function testNotLeapYears($year)
    {
        $input = new Input($year);

        $leapYearValidator = new LeapYear();

        $input->attach($leapYearValidator);
        $isValid = $input->isValid();

        $this->assertFalse($isValid);
    }

    /**
     * Test if null value is a leap year
     */
    public function testNullValue()
    {
        $input = new Input(null);

        $leapYearValidator = new LeapYear();

        $input->attach($leapYearValidator);
        $isValid = $input->isValid();

        $this->assertFalse($isValid);
    }

    /**
     * Test if an empty string is a leap year
     */
    public function testEmptyString()
    {
        $input = new Input("");

        $leapYearValidator = new LeapYear();

        $input->attach($leapYearValidator);
        $isValid = $input->isValid();

        $this->assertFalse($isValid);
    }

    /**
     * Test string years
     *
     * @param $stringYear string
     * @dataProvider stringYears
     */
    public function testStringDigits($stringYear)
    {
        $input = new Input($stringYear);

        $leapYearValidator = new LeapYear();

        $input->attach($leapYearValidator);
        $isValid = $input->isValid();

        $this->assertTrue($isValid);
    }

    /**
     * Test another types and values
     *
     * @dataProvider anotherValues()
     * @param $value
     */
    public function testOtherTypesAndValues($value)
    {
        $input = new Input($value);

        $leapYearValidator = new LeapYear();

        $input->attach($leapYearValidator);
        $isValid = $input->isValid();

        $this->assertFalse($isValid);
    }

    /**
     * Data provider for testLeapYears
     * @return array leap years as integers
     */
    public function leapYears()
    {
        return array(
            array(1984),
            array(1988),
            array(1904),
            array(2004),
            array(2012),
            array(1580),
            array(1600),
            array(2400),
        );
    }

    /**
     * Data provider for testNotLeapYears
     * @return array Not leap years
     */
    public function notLeapYears()
    {
        return array(
            array(1999),
            array(1900),
            array(5),
            array(1775),
            array(1700),
            array(1800),
            array(1986),
            array(1602),
        );
    }

    /**
     * Data provider for testStringDigits
     * @return array  leap years string type
     */
    public function stringYears()
    {
        return array(
            array("1600"),
            array("1492"),
            array("1580"),
            array("1984"),
            array("1980"),
            array("1888"),
            array("1884"),
        );
    }

    public function anotherValues()
    {
        return array(
            array("asdasd"),
            array(0),
            array(897.879),
            array('c'),
            array("A text string"),
            array(false),
            array(true),
        );
    }
}