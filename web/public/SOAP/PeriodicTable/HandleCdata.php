<?php
include 'SOAPClient.php';
include 'CreateCData.php';

try {
    $finalXml = '<simpleXMLData>'.$xml.'</simpleXMLData>';
    $soapVar = new SoapVar($finalXml, XSD_ANYXML);
    $response = $client->__soapCall(
        'HandleCData',
        array(new SoapVar($soapVar, XSD_ANYXML))
    );
    var_dump($response);
} catch (\Exception $e) {
    echo $e;
    var_dump($client->__getLastRequest());
}
