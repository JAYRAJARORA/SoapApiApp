<?php
/**
 * Utility class for creating the XML DOM out of php array
 *
 * PHP version 7.0.25
 *
 * LICENSE: This program is distributed in the hope that it
 * will be useful, but WITHOUT ANY WARRANTY;
 * without even the implied warranty of MERCHANTABILITY
 * or FITNESS FOR A PARTICULAR PURPOSE.
 *
 * @category  HelperClass
 * @package   AppBundle
 * @author    Jayraj Arora <jayraja@mindfiresolutions.com>
 * @copyright 1997-2005 The PHP Group
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 */
namespace AppBundle\Util;

/**
 * Class DomUtil
 *
 * @category HelperClass
 * @package  AppBundle
 * @author   Jayraj Arora <jayraja@mindfiresolutions.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 */
class DomUtil
{
    /**
     *
     * @param $root string The root node of xml
     * @param $nodes array Array of nodes containing key value pairs
     * where key is the response parameter name and value is the
     * value for the parameter
     * @return string
     */
    public static function createXml($root, $nodes)
    {
        // creating a document which creates an empty xml document with xml version
        $document = new \DOMDocument();

        // append root node
        $root = $document->appendChild(
            $document->createElement(
                $root
            )
        );

        // appends nodes to the root
        foreach ($nodes as $node => $nodeText) {
            $resultantNode = $root->appendChild(
                $document->createElement(
                    $node
                )
            );

            // if node does'nt contain data then no need to add text
            if ($nodeText) {
                $resultantNode->appendChild(
                    $document->createTextNode(
                        $nodeText
                    )
                );
            }
        }
        // XML returned as a string
        return $document->saveXML();
    }
}
