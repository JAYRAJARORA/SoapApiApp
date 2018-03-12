<?php
/**
 * Consuming the Holiday soap Api using Soap Client
 * Source of API : http://webservicex.com
 * PHP version 7.0.25
 *
 * LICENSE: This program is distributed in the hope that it
 * will be useful, but WITHOUT ANY WARRANTY;
 * without even the implied warranty of MERCHANTABILITY
 * or FITNESS FOR A PARTICULAR PURPOSE.
 *
 * @category  SoapClient Class
 * @author    Jayraj Arora <jayraja@mindfiresolutions.com>
 * @copyright 1997-2005 The PHP Group
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 */
namespace Soap\Holiday;

/**
 * Class HolidayService
 *
 * @category HelperClass
 * @author   Jayraj Arora <jayraja@mindfiresolutions.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 */
class HolidayService
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
