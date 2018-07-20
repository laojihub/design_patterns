<?php

namespace FactoryMethod;

/**
 * 产品抽象接口
 */
abstract class AbstractProduct
{

}

/**
 * 第一个产品
 */
class Product1 extends AbstractProduct
{

}

/**
 * 第二个产品
 */
class Product2 extends AbstractProduct
{

}

/**
 * 工厂抽象接口
 */
abstract class AbstractFactory
{
    abstract function createProduct();
}

/**
 * 生产第一个产品的工厂
 */
class Product1Factory extends AbstractFactory
{
    public function createProduct()
    {
        return new Product1();
    }
}

/**
 * 生产第二个产品的工厂
 */
class Product2Factory extends AbstractFactory
{
    public function createProduct()
    {
        return new Product2();
    }
}


//使用示例
$product1Factory = new Product1Factory();
$product1 = $product1Factory->createProduct();

$product2Factory = new Product2Factory();
$product2 = $product2Factory->createProduct();


