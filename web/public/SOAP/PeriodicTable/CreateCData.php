<?php
/**
 * Create CData to call the soap method HandleCData
 * PHP version 7.0.25
 *
 * LICENSE: This program is distributed in the hope that it
 * will be useful, but WITHOUT ANY WARRANTY;
 * without even the implied warranty of MERCHANTABILITY
 * or FITNESS FOR A PARTICULAR PURPOSE.
 *
 * @category  HelperFile
 * @author    Jayraj Arora <jayraja@mindfiresolutions.com>
 * @copyright 1997-2005 The PHP Group
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
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
