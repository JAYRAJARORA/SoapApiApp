<?php
/**
 * Soap Client for the call to the method GetAtomicWeight
 *
 * @category  SoapClient
 * @author    Jayraj Arora <jayraja@mindfiresolutions.com>
 */
include 'SoapClient.php';

/**
 * catch exceptions and seeing the request made in case of errors
 * on the client request or the server handling the request
 */
try {
    // call to the desired method to retrieve the atomic Weight from elementName
    $response = $client->__soapCall(
        'GetAtomicWeight',
        array('elementName' => 'ABCDEF')
    );
    // printing the response
    print_r('Response:');
    print_r($response);
} catch (\Exception $e) {
    echo $e;
    // getting the last request made
    print_r($client->__getLastRequest());
}
