<?php
/**
 * Utility class for the atom Soap methods
 *
 * @category  HelperClass
 * @package   AppBundle
 * @author    Jayraj Arora <jayraja@mindfiresolutions.com>
 */
namespace AppBundle\Util;

use AppBundle\Constants\SoapConstants;

/**
 * Class AtomUtil
 *
 * @category HelperClass
 * @package  AppBundle
 * @author   Jayraj Arora <jayraja@mindfiresolutions.com>
 */
class AtomUtil
{
    /**
     * Check whether the atom exists
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
     * @param $owner
     * @param $requestingUser
     * @throws \SoapFault
     */
    public static function checkOwner($owner, $requestingUser) {
        if (strcmp($owner, $requestingUser)) {
            throw new \SoapFault(
                SoapConstants::CLIENT_FAULT_CODE,
                SoapConstants::REQUEST_DENIED
            );
        }
    }
}
