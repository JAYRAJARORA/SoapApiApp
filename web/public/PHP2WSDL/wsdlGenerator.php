<?php
/**
 * Calling the package which converts php to wsdl and generates
 * a wsdl file
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
