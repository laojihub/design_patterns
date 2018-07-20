<?php

namespace Composite;

abstract class OnTheBookShelf
{
    abstract function getBookInfo($previousBook);

    abstract function getBookCount();

    abstract function setBookCount($new_count);

    abstract function addBook($oneBook);

    abstract function removeBook($oneBook);
}

class OneBook extends OnTheBookShelf
{
    private $title;
    private $author;

    function __construct($title, $author)
    {
        $this->title = $title;
        $this->author = $author;
    }

    function getBookInfo($bookToGet)
    {
        if (1 == $bookToGet) {
            return $this->title . " by " . $this->author;
        } else {
            return false;
        }
    }

    function getBookCount()
    {
        return 1;
    }

    function setBookCount($newCount)
    {
        return false;
    }

    function addBook($oneBook)
    {
        return false;
    }

    function removeBook($oneBook)
    {
        return false;
    }
}

class SeveralBooks extends OnTheBookShelf
{
    private $oneBooks = array();
    private $bookCount;

    public function __construct()
    {
        $this->setBookCount(0);
    }

    public function getBookCount()
    {
        return $this->bookCount;
    }

    public function setBookCount($newCount)
    {
        $this->bookCount = $newCount;
    }

    public function getBookInfo($bookToGet)
    {
        if ($bookToGet <= $this->bookCount) {
            return $this->oneBooks[$bookToGet]->getBookInfo(1);
        } else {
            return false;
        }
    }

    public function addBook($oneBook)
    {
        $this->setBookCount($this->getBookCount() + 1);
        $this->oneBooks[$this->getBookCount()] = $oneBook;
        return $this->getBookCount();
    }

    public function removeBook($oneBook)
    {
        $counter = 0;
        while (++$counter <= $this->getBookCount()) {
            if ($oneBook->getBookInfo(1) ==
                $this->oneBooks[$counter]->getBookInfo(1)
            ) {
                for ($x = $counter; $x < $this->getBookCount(); $x++) {
                    $this->oneBooks[$x] = $this->oneBooks[$x + 1];
                }
                $this->setBookCount($this->getBookCount() - 1);
            }
        }
        return $this->getBookCount();
    }
}


//使用示例
$firstBook = new OneBook('Core PHP Programming, Third Edition', 'Atkinson and Suraski');
$firstBook->getBookInfo(1);

$secondBook = new OneBook('PHP Bible', 'Converse and Park');
$secondBook->getBookInfo(1);

$thirdBook = new OneBook('Design Patterns', 'Gamma, Helm, Johnson, and Vlissides');
$thirdBook->getBookInfo(1);

$books = new SeveralBooks();

$booksCount = $books->addBook($firstBook);
$books->getBookInfo($booksCount);

$booksCount = $books->addBook($secondBook);
$books->getBookInfo($booksCount);

$booksCount = $books->addBook($thirdBook);
$books->getBookInfo($booksCount);

$booksCount = $books->removeBook($firstBook);
$books->getBookCount();

$books->getBookInfo(1);

$books->getBookInfo(2);