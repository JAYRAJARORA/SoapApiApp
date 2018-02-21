<?php

class HolidayService
{
    private $client;

    public function __construct($url)
    {

        $this->client = new SoapClient($url, ['trace'=> 1]);
    }

    public function getHolidaysForMonth()
    {
        $function = 'GetHolidaysForMonth';
        $params = array(
            'countryCode' => 'Scotland',
            'year' => 2016,
            'month'=> 5
        );
        $response = $this->client->__soapCall($function, array($params));
        var_dump($response);
    }

    public function getHolidaysForYear()
    {
        $function = 'GetHolidaysForYear';
        $params = array(
            'countryCode' => 'Scotland',
            'year' => 2015
        );
        $response = $this->client->__soapCall($function, array($params));
        var_dump($response);
    }
}

$url = 'http://www.holidaywebservice.com//HolidayService_v2/HolidayService2.asmx?wsdl';
$ob = new HolidayService($url);
$ob->getHolidaysForMonth();
$ob->getHolidaysForYear();