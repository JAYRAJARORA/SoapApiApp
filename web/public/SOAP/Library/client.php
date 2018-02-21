<?php

// model
class Book
{
    public $name;
    public $year;
}

// create instance and set a book name
$book = new Book();
$book->name ='test 2';

// initialize SOAP client and call web service function
try {
    $client = new SoapClient(
        'http://soapapi.test/public/WSDL/test.wsdl',
        ['trace' => 1, 'cache_wsdl' => WSDL_CACHE_NONE]);
    var_dump($client->__getFunctions());
    $resp = $client->__soapCall('bookYear', array($book));
// dump response
    var_dump($resp);
    var_dump($client->__getLastRequest());
} catch (Exception $e) {
    var_dump($client->__getLastRequest());
    var_dump($e);
}