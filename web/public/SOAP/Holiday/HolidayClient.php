<?php
/**
 * Consuming the Holiday soap Api by calling the HolidayService Methods
 *
 * @category  SoapClient
 * @author    Jayraj Arora <jayraja@mindfiresolutions.com>
 */
require 'Holiday.php';

$url = 'http://www.holidaywebservice.com//HolidayService_v2/HolidayService2.asmx?wsdl';

// Initializing the soap client
$ob = new \Soap\Holiday\Holiday($url);
// Call for the soap method GetHolidaysForMonth
$ob->getHolidaysForMonth();
// Call for the soap method GetHolidaysForYear
$ob->getHolidaysForYear();
