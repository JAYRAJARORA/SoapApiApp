<?php

namespace AppBundle\Util;

class DomUtil
{
    public static function createXml($root, $nodes)
    {
        $document = new \DOMDocument();
        $root = $document->appendChild(
            $document->createElement(
                $root
            )
        );
        foreach ($nodes as $node => $nodeText) {
            $resultantNode = $root->appendChild(
                $document->createElement(
                    $node
                )
            );
            if ($nodeText) {
                $resultantNode->appendChild(
                    $document->createTextNode(
                        $nodeText
                    )
                );
            }
        }
        $response = $document->saveXML();

        return $response;
    }
}