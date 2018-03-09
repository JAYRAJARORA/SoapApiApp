<?php
include 'SOAPClient.php';
include 'CreateCData.php';

try {
    $soapVar = new SoapVar($xml, XSD_ANYXML);
    $param = new SoapVar([$soapVar], SOAP_ENC_OBJECT);
    $client->__setSoapHeaders($header);
    $response = $client->__soapCall(
        'HandleCData',
        array('simpleXMLData' => $param)
    );
    var_dump($response);
} catch (\Exception $e) {
    echo $e;
    var_dump($client->__getLastRequest());
}
