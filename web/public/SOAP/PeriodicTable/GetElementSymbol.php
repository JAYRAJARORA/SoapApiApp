<?php
/**
 * Soap Client for the call to the method GetElementSymbol
 */
include 'SoapClient.php';

/**
 * catch exceptions and seeing the request made in case of errors
 * on the client request or the server handling the request
 */
try {
    // call to the desired method to retrieve the atom list
    $response = $client->__soapCall(
        'GetElementSymbol',
        array('elementName' => 'Chromium')
    );
    // printing the response
    print_r('Response:');
    print_r($response);
} catch (\Exception $e) {
    echo $e;
    // getting the last request made
    print_r($client->__getLastRequest());
}
