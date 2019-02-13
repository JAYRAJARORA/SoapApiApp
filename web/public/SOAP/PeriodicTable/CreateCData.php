<?php
/**
 * Create CData to call the soap method HandleCData
 */
include __DIR__.'/../../../../vendor/autoload.php';

use AppBundle\Util\DomUtil;

// add cdata string to the resultant xml
$xml = '<![CDATA[';
/*
 * call the helper function for creating xml having
 * parameters as root and nodes with its text
 */
$root = 'CreateAtom';
$nodes = array(
    'ElementName' => 'Aluminium',
    'ElementSymbol' => 'Al',
    'AtomicNumber' => 29,
    'AtomicWeight' => 45,
);
// create xml as string
$xml .= DomUtil::createXml($root, $nodes);

// append the end part of cData
$xml .= ']]>';
