<?php
try {
    $client = new \SoapClient(
        'http://soapapi.test/public/WSDL/PeriodicTable.wsdl',
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
    $xml = '<![CDATA[';
    $document = new \DOMDocument();
    $root = $document->appendChild($document->createElement('VerifyAccountReturn'));
    $returnCode = $root->appendChild($document->createElement('returnCode'));
    $returnCode->appendChild($document->createTextNode('1'));
    $root->appendChild($document->createElement('errorCode'));
    $sub = $root->appendChild($document->createElement('subsriberFound'));
    $sub->appendChild($document->createTextNode('2'));
    $numContact = $root->appendChild($document->createElement('numContact'));
    $numContact->appendChild($document->createTextNode('121212'));
    $amount = $root->appendChild($document->createElement('amount'));
    $amount->appendChild($document->createTextNode('2122'));
    $cur = $root->appendChild($document->createElement('currency'));
    $cur->appendChild($document->createTextNode('INR'));
    $xml .= $document->saveXML();

    $xml .= ']]>';
    $test =             new SoapVar(
        $xml,
        XSD_ANYXML
    );
    $param = new SoapVar([$test], SOAP_ENC_OBJECT);
    $client->__setSoapHeaders($header);
    $response = $client->__soapCall(
        'HandleCData',
        ['simpleXMLData'=>$param]
    );
    var_dump($response);
    echo "\n============Request=============\n";
    var_dump($client->__getLastRequest());
} catch (\Exception $e) {
    echo $e;
    echo '==========';
    var_dump($client->__getLastRequest());
}
