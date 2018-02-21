<?php

try {
    $url = 'http://www.holidaywebservice.com//HolidayService_v2/HolidayService2.asmx?wsdl';
    $client = new SoapClient($url, ['trace'=> 1]);
    $fcs = $client->__getFunctions();
    var_dump($fcs);
    $params = array(
        'countryCode' => 'Scotland',
        'holidayCode' => 'MAY-DAY',
        'year' => 2017
    );
    $res = $client->__soapCall('GetHolidayDate', array($params));

} catch (Exception $e) {
    var_dump($e);
    var_dump($client->__getLastRequest());
}
var_dump($res);
var_dump($client->__getLastRequest());
