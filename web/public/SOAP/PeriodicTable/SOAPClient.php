<?php
include __DIR__ . '/../../../../environment.php';
require_once __DIR__.'/../../../../vendor/autoload.php';

use AppBundle\Constants\SoapConstants;

try {
    $client = new \SoapClient(
        SoapConstants::WSDL,
        array('trace' => 1,
            'cache_wsdl' => WSDL_CACHE_NONE
        )
    );

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
} catch (\Exception $e) {
    echo $e;
}
