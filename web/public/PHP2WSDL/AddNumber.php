<?php
/**
 * Utility class for creating a php class which has to be
 * converted to wsdl
 */
namespace PHP2WSDL\Test;

/**
 * Class AtomUtil
 * Example class with @soap annotation.
 */
class AddNumber
{
    /**
     * Adds two numbers.
     *
     * @soap
     *
     * @param float $apple
     * @param float $p2
     * @return float
     */
    protected function add($apple, $p2)
    {
        return ($apple + $p2);
    }
}
