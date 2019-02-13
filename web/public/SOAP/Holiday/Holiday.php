<?php
/**
 * Consuming the Holiday soap Api using Soap Client
 *
 * @category  SoapClient Class
 * @author    Jayraj Arora <jayraja@mindfiresolutions.com>
 */
namespace Soap\Holiday;

/**
 * Class HolidayService
 *
 * @category HelperClass
 * @author   Jayraj Arora <jayraja@mindfiresolutions.com>
 */
class Holiday
{
    private $client;

    /**
     * Initializing the soap client
     * HolidayService constructor.
     * @param $url
     */
    public function __construct($url)
    {
        $this->client = new \SoapClient($url, ['trace'=> 1]);
    }

    /**
     * Call for the soap method GetHolidaysForMonth
     */
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

    /**
     * Call for the soap method GetHolidaysForYear
     */
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
