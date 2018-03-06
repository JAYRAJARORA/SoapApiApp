<?php

namespace AppBundle\Util;

use AppBundle\Constants\SoapConstants;

class AtomUtil
{
    /**
     * @param $atom
     * @throws \SoapFault
     */
    public static function isAtomExist($atom)
    {
        if (!$atom) {
            throw new \SoapFault(
                'Server',
                'No Atom Object Found'
            );
        }
    }

    /**
     * @param $isUserValid
     * @param $flag
     * @throws \SoapFault
     */
    public static function isUserValid($isUserValid, $flag)
    {
        if (! $isUserValid && !$flag) {
            throw new \SoapFault(
                SoapConstants::CLIENT_FAULT_CODE,
                SoapConstants::AUTHENTICATION_ERROR
            );
        }
    }
}