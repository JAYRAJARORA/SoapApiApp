<?php
/**
 * Consuming the Weather soap Api using Soap Client
 *
 * @category  SoapClient
 * @author    Jayraj Arora <jayraja@mindfiresolutions.com>
 */

try {
    // url for the wsdl to consume the soap api from
    $url = 'http://www.webservicex.com/globalweather.asmx?wsdl';
    // Initializing the soap client
    $client = new SoapClient($url, ['trace'=>1]);
    
    // retrieving a list of functions
    print_r($client->__getFunctions());
    print_r($res);
    $res = $client->__soapCall(
        'GetCitiesByCountry',
        array(['CountryName' =>'Canada'])
    );
} catch (Exception $e) {
    print_r($e);
    print_r($client->__getLastRequest());
}
