<?php

use PolarBear\PolarValidator\Validators\Cuit;

/**
 * Class CuitTest
 *
 * @author Alejandro A. De Luca <tury3001@gmail.com>
 *
 */
class CuitTest extends PHPUnit_Framework_TestCase
{

    /**
     * Test only valid cuits
     *
     * @param $value
     * @dataProvider validCuitsProvider
     */
    public function testValidCuits($value)
    {
        $cuitValidator = new Cuit();
        $this->assertTrue($cuitValidator->validate($value));
    }

    /**
     * Test Invalid Cuits
     *
     * Right format but wrong digits
     * @param $value
     * @dataProvider invalidCuitsProvider
     */
    public function testInvalidCuits($value)
    {
        $cuitValidator = new Cuit();
        $this->assertFalse($cuitValidator->validate($value));
    }

    /**
     * Test invalid data
     * @param $value
     * @dataProvider invalidDataForCuit
     */
    public function testInvalidData($value)
    {
        $cuitValidator = new \PolarBear\PolarValidator\Validators\Cuit();
        $this->assertFalse($cuitValidator->validate($value));
    }

    /**
     * Data provider of validCuits
     *
     * @see testValidCuits
     * @return array
     */
    public function validCuitsProvider()
    {
        return array(
            array('20-03023200-4'),
            array('20-03543929-4'),
            array('20-05510469-8'),
            array('30-50001091-2'),
            array('33-69345023-9'),
            array('34-99903208-9'),
            array('33-50000999-9'),
            array('27-33505099-7'),
            array('24-10542289-6'),
            array('24-11772828-1'),
        );
    }


    /**
     * Data provider of invalid invalidCuitsProvider
     *
     * @return array
     */
    public function invalidCuitsProvider()
    {
        return array(
            array('20-03023200-0'),
            array('20-03543929-7'),
            array('20-05510469-1'),
            array('30-50001091-6'),
            array('33-69345023-3'),
            array('34-99903208-6'),
            array('33-50000999-2'),
            array('27-33505099-9'),
            array('24-10542289-1'),
            array('24-11772828-2'),
        );
    }

    /**
     * Data provider of invalidData
     *
     * @return array
     */
    public function invalidDataForCuit()
    {
        return array(
            array('20374457462'),
            array('vmdi234sdfi3o4'),
            array('qpaoski'),
            array('20-3984-323423'),
            array('-2039-304-04'),
            array('33-857586758-3'),
            array('dog, cat, parrot'),
            array(''),
            array(null),
        );
    }
}