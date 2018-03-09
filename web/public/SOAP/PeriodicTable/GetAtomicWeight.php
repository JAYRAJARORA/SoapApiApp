<?php
include 'SOAPClient.php';

try {
    $response = $client->__soapCall(
        'GetAtomicWeight',
        array('elementName' => 'Chromium')
    );
    var_dump($response);

} catch (\Exception $e) {
    echo $e;
    var_dump($client->__getLastRequest());
}
