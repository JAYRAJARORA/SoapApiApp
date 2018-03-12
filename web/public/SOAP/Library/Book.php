<?php
/**
 * Model, which uses in web service functions as parameter
 * PHP version 7.0.25
 *
 * LICENSE: This program is distributed in the hope that it
 * will be useful, but WITHOUT ANY WARRANTY;
 * without even the implied warranty of MERCHANTABILITY
 * or FITNESS FOR A PARTICULAR PURPOSE.
 *
 * @category  SoapClient Class
 * @author    Jayraj Arora <jayraja@mindfiresolutions.com>
 * @copyright 1997-2005 The PHP Group
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 */
namespace Soap\Book;

/**
 * Class Book
 *
 * @category HelperClass
 * @author   Jayraj Arora <jayraja@mindfiresolutions.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 */
class Book
{
    public $name;
    public $year;

    /**
     * Determines published year of the book by name.
     * @param Book $book book instance with name set.
     * @return int published year of the book or 0 if not found.
     */
    public function bookYear($book)
    {
        // list of the books
        $_books= array(
            array('name'=>'test 1', 'year'=>2011),
            array('name'=>'test 2', 'year'=>2012),
            array('name'=>'test 3', 'year'=>2013),
        );
        // search book by name
        foreach ($_books as $bk) {
            if ($bk['name'] == $book->name) {
                return $bk['year']; // book found
            }
        }

        return 0; // book not found
    }
}
