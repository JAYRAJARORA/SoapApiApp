<?php
/**
 * Consuming the Holiday soap Api by calling the HolidayService Methods
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
require 'Holiday.php';

$url = 'http://www.holidaywebservice.com//HolidayService_v2/HolidayService2.asmx?wsdl';

// Initializing the soap client
$ob = new \Soap\Holiday\Holiday($url);
// Call for the soap method GetHolidaysForMonth
$ob->getHolidaysForMonth();
// Call for the soap method GetHolidaysForYear
$ob->getHolidaysForYear();
