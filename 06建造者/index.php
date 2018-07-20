<?php

namespace Builder;

/**
 * 要建造的对象
 */
class Car
{
    protected $wheels;

    protected $frame;

    protected $engine;

    protected $seat;


    public function setWheels($wheels)
    {
        $this->wheels = $wheels;
    }
}

/**
 * 抽象建造方法和结果输出方法
 * @package Builder
 */
abstract class AbstractCarBuilder
{
    abstract function buildWheels();

    abstract function buildFrame();

    abstract function buildEngine();

    abstract function buildSeat();

    abstract function getCar();
}

/**
 * 实现具体的建造方法
 * @package Builder
 */
class PorscheBuilder extends AbstractCarBuilder
{

    protected $car;


    public function __construct()
    {
        $this->car = new Car();
    }

    public function buildWheels()
    {
        $this->car->setWheels('保时捷专用轮子');
    }

    public function buildFrame()
    {

    }

    public function buildEngine()
    {

    }

    public function buildSeat()
    {

    }

    public function getCar()
    {
        return $this->car;
    }
}


/**
 * 建造器调用者抽象
 * @package Builder
 */
abstract class AbstractDirect
{
    abstract function __construct(AbstractCarBuilder $builder);

    abstract function getCar();
}

/**
 * 建造器调用者具体实现
 * @package Builder
 */
class ConceretDirect extends AbstractDirect
{
    protected $builder;

    public function __construct(AbstractCarBuilder $builder)
    {
        $this->builder = $builder;
    }

    public function getCar()
    {
        $this->builder->buildSeat();
        $this->builder->buildEngine();
        $this->builder->buildFrame();
        $this->builder->buildWheels();

        return $this->builder->getCar();
    }
}

//使用示例
$builder = new PorscheBuilder();
$direct = new ConceretDirect($builder);

$car = $direct->getCar();