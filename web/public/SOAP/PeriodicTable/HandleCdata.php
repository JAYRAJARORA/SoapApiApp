<?php
/**
 * Soap Client for the call to the method HandleCData
 * Here HardCoding of the xml tag is done
 *
 * PHP version 7.0.25
 *
 * LICENSE: This program is distributed in the hope that it
 * will be useful, but WITHOUT ANY WARRANTY;
 * without even the implied warranty of MERCHANTABILITY
 * or FITNESS FOR A PARTICULAR PURPOSE.
 *
 * @category  SoapClient
 * @author    Jayraj Arora <jayraja@mindfiresolutions.com>
 * @copyright 1997-2005 The PHP Group
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 */
include 'SoapClient.php';
include 'CreateCData.php';

/**
 * catch exceptions and seeing the request made in case of errors
 * on the client request or the server handling the request
 */
try {
    // hardcoded the xml tag
    $finalXml = '<simpleXMLData>'.$xml.'</simpleXMLData>';
    // initializing the soap variable for the soap call
    $soapVar = new SoapVar($finalXml, XSD_ANYXML);
    // call to the desired method to handle cData.
    $response = $client->__soapCall(
        'CreateAtomUsingCData',
        array(new SoapVar($soapVar, XSD_ANYXML))
    );

    print_r('Response:'.$response);
} catch (\Exception $e) {
    echo $e;
    // getting the last request made
    print_r($client->__getLastRequest());
}
