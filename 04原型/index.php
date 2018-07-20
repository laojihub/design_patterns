<?php
namespace ProtoType;

/**
 * 将一类事物的原型抽象出来
 */
abstract class BookProtoType
{
    protected $title;

    protected $topic;

    abstract function __clone();

    public function setTitle($title)
    {
        $this->title = $title;
    }
}


/**
 * php书籍
 * @package ProtoType
 */
class PHPBookProtoType extends BookProtoType
{
    public function __construct()
    {
        $this->topic = 'php';
    }

    function __clone()
    {

    }
}


/**
 * sql书籍
 * @package ProtoType
 */
class SQLBookProtoType extends BookProtoType
{
    public function __construct()
    {
        $this->topic = 'SQL';
    }

    function __clone()
    {

    }
}


$phpProto =  new PHPBookProtoType();
$sqlProto = new SQLBookProtoType();

$book1 = clone $phpProto;
$book1->setTitle('book1');

$book2 = clone $sqlProto;
$book2->setTitle('book2');


