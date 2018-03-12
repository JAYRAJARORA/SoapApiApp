<?php
/**
 * Calling the package which converts php to wsdl and generates
 * a wsdl file
 *
 * PHP version 7.0.25
 *
 * LICENSE: This program is distributed in the hope that it
 * will be useful, but WITHOUT ANY WARRANTY;
 * without even the implied warranty of MERCHANTABILITY
 * or FITNESS FOR A PARTICULAR PURPOSE.
 *
 * @category  WSDL Generator
 * @author    Jayraj Arora <jayraja@mindfiresolutions.com>
 * @copyright 1997-2005 The PHP Group
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 */
require_once __DIR__.'/../../../vendor/autoload.php';
require 'AddNumber.php';

use PHP2WSDL\PHPClass2WSDL;

$class = 'PHP2WSDL\Test\AddNumber';
$serviceURI = 'localhost';
$wsdlGenerator = new PHPClass2WSDL($class, $serviceURI);

/**
 * Generate the WSDL from the class adding only the public
 * methods that have @soap annotation.
 */
$wsdlGenerator->generateWSDL(true);

// Or save as file
$wsdlXML = $wsdlGenerator->save('web/public/WSDL/addNumber.wsdl');
