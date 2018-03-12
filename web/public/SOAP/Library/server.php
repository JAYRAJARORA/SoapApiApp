<?php
/**
 * Soap Server for the book Api
 * PHP version 7.0.25
 *
 * LICENSE: This program is distributed in the hope that it
 * will be useful, but WITHOUT ANY WARRANTY;
 * without even the implied warranty of MERCHANTABILITY
 * or FITNESS FOR A PARTICULAR PURPOSE.
 *
 * @category  SoapServer
 * @author    Jayraj Arora <jayraja@mindfiresolutions.com>
 * @copyright 1997-2005 The PHP Group
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 */
require 'Book.php';

use Soap\Book\Book as Book;

// turn off WSDL caching
ini_set("soap.wsdl_cache_enabled", "0");

// initialize SOAP Server
// 'book' complex type in WSDL file mapped to the Book PHP class
$server=new SoapServer(
    "http://soapapi.test/public/WSDL/test.wsdl",
    array(
        'classmap'=>array(
            'book'=>Book::class
            )
    )
);
$book = new Book();
// register available functions
$server->setObject($book);
ob_start();
// start handling requests
$server->handle();
print_r(ob_get_clean());
