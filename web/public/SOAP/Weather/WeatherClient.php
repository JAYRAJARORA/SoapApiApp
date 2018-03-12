<?php
try {
    $url = 'http://www.webservicex.com/globalweather.asmx?wsdl';
    $client = new SoapClient($url, ['trace'=>1]);
    $fcs = $client->__getFunctions();
    var_dump($fcs);
    $res = $client->__soapCall(
        'GetCitiesByCountry',
        array(['CountryName' =>'Canada'])
    );
} catch (Exception $e) {
    var_dump($e);
    var_dump($client->__getLastRequest());
}
var_dump($client->__getLastRequest());
var_dump($res);
