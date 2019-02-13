<?php
/**
 * Utility class for creating the XML DOM out of php array
 * @category  HelperClass
 * @package   AppBundle
 * @author    Jayraj Arora <jayraja@mindfiresolutions.com>
 */
namespace AppBundle\Util;

/**
 * Class DomUtil
 *
 * @category HelperClass
 * @package  AppBundle
 * @author   Jayraj Arora <jayraja@mindfiresolutions.com>
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
