<?php
/**
 * Soap Client for the call to the method HandleCData
 * Here HardCoding of the xml tag is avoided
 * and nesting of SoapVar is done
 *
 * @category  SoapClient
 * @author    Jayraj Arora <jayraja@mindfiresolutions.com>
 */
include 'SoapClient.php';
include 'CreateCData.php';

/**
 * catch exceptions and seeing the request made in case of errors
 * on the client request or the server handling the request
 */
try {
    // initializing the soap variable for the soap call
    $soapVar = new SoapVar($xml, XSD_ANYXML);
    $param = new SoapVar([$soapVar], SOAP_ENC_OBJECT);

    // call to the desired method to handle cData.
    $response = $client->__soapCall(
        'CreateAtomUsingCData',
        array('simpleXMLData' => $param)
    );
    print_r('Response:'.$response);
} catch (\Exception $e) {
    echo $e;
    // getting the last request made
    print_r($client->__getLastRequest());
}
