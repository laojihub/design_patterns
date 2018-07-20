<?php


class SimpleBook
{
    private $author;
    private $title;

    function __construct($author_in, $title_in)
    {
        $this->author = $author_in;
        $this->title = $title_in;
    }

    function getAuthor()
    {
        return $this->author;
    }

    function getTitle()
    {
        return $this->title;
    }
}


/**
 * 对象适配器
 */
class BookAdapter
{
    private $book;

    function __construct(SimpleBook $book_in)
    {
        $this->book = $book_in;
    }

    function getAuthorAndTitle()
    {
        return $this->book->getTitle() . ' by ' . $this->book->getAuthor();
    }

    function getAuthor()
    {
        return $this->book->getAuthor();
    }

    function getTitle()
    {
        return $this->book->getTitle();
    }
}


interface IBook
{
    function getAuthorAndTitle();
}

/**
 * 类适配器
 */
class BookAdapter2 extends SimpleBook implements IBook
{
    public function getAuthorAndTitle()
    {
        return $this->getTitle() . ' by ' . $this->getAuthor();
    }
}


//使用示例
$book = new SimpleBook("Gamma, Helm, Johnson, and Vlissides", "Design Patterns");
$bookAdapter = new BookAdapter($book);

$bookAdapter = new BookAdapter2("Gamma, Helm, Johnson, and Vlissides", "Design Patterns");

