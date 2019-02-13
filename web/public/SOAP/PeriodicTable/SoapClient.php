<?php
/**
 * Soap Client all the soap call to be used. Authentication to be added
 * with the username and password from environment variables
 */
include __DIR__ . '/../../../../environment.php';
require_once __DIR__.'/../../../../vendor/autoload.php';

use AppBundle\Constants\SoapConstants;

/**
 * catch exceptions and seeing the request made in case of errors
 * on the client request or the server handling the request
 */
try {
    // creating the soap and setting the debugging option to true
    $client = new \SoapClient(
        SoapConstants::WSDL,
        array('trace' => 1,
            'cache_wsdl' => WSDL_CACHE_NONE
        )
    );

    // setting the auth header
    $auth = new stdClass();
    $auth->username = getenv('username');
    $auth->password = getenv('password');
    $header = new SoapHeader(
        'http://soapapi.test/public/WSDL/PeriodicTable.wsdl',
        'checkAuth',
        $auth,
        false
    );
    $client->__setSoapHeaders($header);
    // retrieve a list of functions
    print_r($client->__getFunctions());
} catch (\Exception $e) {
    echo $e;
}
