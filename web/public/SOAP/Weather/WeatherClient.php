<?php
/**
 * Consuming the Weather soap Api using Soap Client
 * Source of API : http://webservicex.com
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
