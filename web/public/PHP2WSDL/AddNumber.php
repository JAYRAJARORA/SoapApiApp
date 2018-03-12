<?php
/**
 * Utility class for creating a php class which has to be
 * converted to wsdl
 *
 * PHP version 7.0.25
 *
 * LICENSE: This program is distributed in the hope that it
 * will be useful, but WITHOUT ANY WARRANTY;
 * without even the implied warranty of MERCHANTABILITY
 * or FITNESS FOR A PARTICULAR PURPOSE.
 *
 * @category  HelperClass
 * @package   None
 * @author    Jayraj Arora <jayraja@mindfiresolutions.com>
 * @copyright 1997-2005 The PHP Group
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 */
namespace PHP2WSDL\Test;

/**
 * Class AtomUtil
 * Example class with @soap annotation.
 *
 * @category HelperClass
 * @author   Jayraj Arora <jayraja@mindfiresolutions.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 */
class AddNumber
{
    /**
     * Adds two numbers.
     *
     * @soap
     *
     * @param float $apple
     * @param float $p2
     * @return float
     */
    protected function add($apple, $p2)
    {
        return ($apple + $p2);
    }
}
