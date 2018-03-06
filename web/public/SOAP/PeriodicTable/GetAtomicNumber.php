<?php
use AppBundle\Constants\SoapConstants;

try {
    $client = new \SoapClient(
        SoapConstants::WSDL,
        array('trace' => 1,
            'cache_wsdl' => WSDL_CACHE_NONE
        )
    );
    $auth = new stdClass();
    $auth->username = "jk";
    $auth->password = "jka";
    $header = new SoapHeader(
        'http://soapapi.test/public/WSDL/PeriodicTable.wsdl',
        'checkAuth',
        $auth,
        false
    );
    $client->__setSoapHeaders($header);
    $response = $client->__soapCall(
        'GetAtomicNumber',
        array('elementName' => 'Chromium')
    );
    var_dump($client->__getFunctions());
    var_dump($response);
    var_dump($client->__getLastRequest());
} catch (\Exception $e) {
    echo $e;
    var_dump($client->__getLastRequest());
}
