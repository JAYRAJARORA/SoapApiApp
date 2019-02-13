<?php
/**
 * Soap Client for the book Api
 * @category  SoapClient
 * @author    Jayraj Arora <jayraja@mindfiresolutions.com>
 */
include 'Book.php';

// create instance and set a book name
$book = new \Soap\Book\Book();
$book->name ='test 2';

try {
    // initialize SOAP client and call web service function
    $client = new SoapClient(
        'http://soapapi.test/public/WSDL/test.wsdl',
        array('trace' => 1, 'cache_wsdl' => WSDL_CACHE_NONE)
    );
    // retrieve a list of functions
    print_r($client->__getFunctions());
    echo "\n";
    //  call the method bookYear
    $resp = $client->__soapCall('bookYear', array($book));
    echo "\n";
    // dump response
    print_r($resp);
    echo "\n";
    // get last request that is made
    print_r($client->__getLastRequest());
} catch (Exception $e) {
    print_r($client->__getLastRequest());
    echo "\n";
    print_r($e);
}
