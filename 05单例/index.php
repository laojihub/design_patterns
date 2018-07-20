<?php
namespace singleton;

/**
 * 仅有一个实例
 * @package singleton
 */
class Singleton
{
    static $instance;

    private function __construct()
    {
    }


    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new Singleton();
        }
        return self::$instance;
    }
}


$one = Singleton::getInstance();

$two = Singleton::getInstance();