<?php
/**
 * Soap Server for the book Api
 *
 * @category  SoapServer
 * @author    Jayraj Arora <jayraja@mindfiresolutions.com>
 */
require 'Book.php';
require 'BookYear.php';

use Soap\Book\BookYear as BookYear;
use Soap\Book\Book as Book;

// turn off WSDL caching
ini_set("soap.wsdl_cache_enabled", "0");

// initialize SOAP Server
// 'book' complex type in WSDL file mapped to the Book PHP class
$server=new SoapServer(
    "http://soapapi.test/public/WSDL/test.wsdl",
    array('classmap'=>array('book'=>Book::class))
);
$book = new BookYear();
// register available functions
$server->setObject($book);
ob_start();
// start handling requests
$server->handle();
print_r(ob_get_clean());
