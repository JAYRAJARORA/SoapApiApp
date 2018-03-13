<?php
/**
 * Utility class for the atom Soap methods
 *
 * PHP version 7.0.25
 *
 * LICENSE: This program is distributed in the hope that it
 * will be useful, but WITHOUT ANY WARRANTY;
 * without even the implied warranty of MERCHANTABILITY
 * or FITNESS FOR A PARTICULAR PURPOSE.
 *
 * @category  HelperClass
 * @package   AppBundle
 * @author    Jayraj Arora <jayraja@mindfiresolutions.com>
 * @copyright 1997-2005 The PHP Group
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 */
namespace AppBundle\Util;

use AppBundle\Constants\SoapConstants;

/**
 * Class AtomUtil
 *
 * @category HelperClass
 * @package  AppBundle
 * @author   Jayraj Arora <jayraja@mindfiresolutions.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
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
