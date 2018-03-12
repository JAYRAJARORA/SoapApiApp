<?php
/**
 * Soap Client for the book Api
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
    //  call the method bookYear
    $resp = $client->__soapCall('bookYear', array($book));
    // dump response
    print_r($resp);
    // get last request that is made
    print_r($client->__getLastRequest());
} catch (Exception $e) {
    print_r($client->__getLastRequest());
    print_r($e);
}
