<?php

use PolarBear\PolarValidator\Input;
use PolarBear\PolarValidator\Validators\Email;

/**
 * class EmailTest
 *
 * Test email validation
 *
 * @author Alejandro A. De Luca <adeluca@polarbear.com.ar>
 *
 */
class EmailTest extends PHPUnit_Framework_TestCase
{
    /**
     * Test email validation
     * @dataProvider validEmailProvider
     */
    public function testValidEmail($value)
    {
        $input = new Input($value);
        $emailValidator = new Email();
        $input->attach($emailValidator);

        $this->assertTrue($input->isValid());
    }

    /**
     * Test email validation
     * @dataProvider invalidEmailProvider
     */
    public function testInvalidEmail($value)
    {
        $input = new Input($value);
        $emailValidator = new Email();
        $input->attach($emailValidator);

        $this->assertFalse($input->isValid());
    }


    /**
     * Valid emails data provider
     *
     * @return array
     */
    public function validEmailProvider()
    {
        return array(
            array("pracstr23@a234sc.com.mx"),
            array("george.taylor@mycompany.com"),
            array("_P_@email.net"),
            array("london@a234sc.com.mx"),
            array("drexler@a234sc.com.mx.ar.es"),
            array("pracstr23@plate.net"),
            array("pracstr23@a234sc.ar"),
        );
    }

    /**
     * Invalid emails provider
     *
     * @return array
     */
    public function invalidEmailProvider()
    {
        return array(
            array(""),
            array("@company.com"),
            array("mycompany@"),
            array("greg@peters@company.com"),
            array("paramaribo"),
            array("cañaveral@cabo.com"),
            array("london@.com")
        );
    }

}
