<?php

namespace PolarBear\PolarValidator\Validators;

use PolarBear\PolarValidator\Validator;


/**
 * class Cuit
 *
 * Validate CUIT (Clave Única de Identificación Tributaria)
 * It's a unique key to identify companies and persons in argentine's tributary
 * system. This key is given by AFIP.
 * It works also with CUILs.
 *
 * @link http://www.afip.gob.ar/
 * @link https://es.wikipedia.org/wiki/Clave_%C3%9Anica_de_Identificaci%C3%B3n_Tributaria
 * @author Alejandro A. De Luca <tury3001@gmail.com>
 *
 */
class Cuit implements Validator
{

    /**
     * CUIT/CUIL validator
     *
     * Algorithm taken from Wikipedia
     *
     * @param $value string|int|float  Cuit
     * @return bool
     */
    public function validate($value)
    {
        $value = preg_replace('/[^\d]/', '', (string) $value);
        if (strlen($value) != 11 ) {
            return false;
        }
        $acumulado = 0;
        $digits = str_split($value);

        // obtain digit
        $digit = array_pop($digits);

        for ($i=0; $i < count($digits); $i++ ) {
            $acumulado += $digits[9-$i] * (2 + ($i % 6 ));
        }
        $verif = 11 - ( $acumulado % 11 );
        $verif = $verif == 11? 0 : $verif;

        return $digit == $verif;
    }
}