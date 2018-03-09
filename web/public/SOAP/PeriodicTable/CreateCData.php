<?php
include __DIR__.'/../../../../vendor/autoload.php';

use AppBundle\Util\DomUtil;

$xml = '<![CDATA[';
$root = 'CheckAccount';
$nodes = array(
    'numCard' => '121212113',
    'accountRef' => '',
    'currency' => 'EURO',
    'country' => 'FRA',
    'typeOperation' => 1
);

$xml .= DomUtil::createXml($root, $nodes);
$xml .= ']]>';
