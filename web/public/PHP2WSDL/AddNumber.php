<?php
namespace PHP2WSDL\Test;

/**
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
