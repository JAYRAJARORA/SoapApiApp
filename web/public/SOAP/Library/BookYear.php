<?php

namespace Soap\Book;

class BookYear
{
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