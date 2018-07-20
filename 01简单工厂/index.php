<?php

namespace SimpleFactory;
/**
 * 产品抽象接口
 */
abstract class  AbstractProduct
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
 * 简单工厂
 */
class Factory
{
    public function __construct()
    {
    }

    public function createProduct($type)
    {
        switch($type){
            case 'product1':
                return new Product1();
            case 'product2':
                return new Product2();
            default:
                throw new \Exception('not support this product');
        }
    }
}

//使用示例
$factory = new Factory();
$product1 = $factory->createProduct('product1');
$product2 = $factory->createProduct('product2');