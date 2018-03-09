<?php

require_once __DIR__.'/../../../vendor/autoload.php';
require 'AddNumber.php';

use PHP2WSDL\PHPClass2WSDL;

$class = 'PHP2WSDL\Test\AddNumber';
$serviceURI = 'localhost';
$wsdlGenerator = new PHPClass2WSDL($class, $serviceURI);
// Generate the WSDL from the class adding only the public methods that have @soap annotation.
$wsdlGenerator->generateWSDL(true);
// Dump as string
$wsdlXML = $wsdlGenerator->dump();
// Or save as file
$wsdlXML = $wsdlGenerator->save('web/public/WSDL/addNumber.wsdl');

