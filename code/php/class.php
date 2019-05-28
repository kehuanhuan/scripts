<?php

/**
 *
 */
class Test
{
    private $name;

    private static $self;

    private function __construct()
    {
    }

    public function  __get($name)
    {
        echo '__get()'.$name;
    }

    public function __set($name, $value)
    {
        echo $name.$value;
    }

    public function __call($name, $value)
    {
        echo '__call()'.$name.$value;
    }

    public function getName()
    {
        echo $this->name;
    }

    public function setName($name)
    {
        $this->name =  $name ? : 'khh';
    }

    public static function getInstance()
    {
        if (!self::$self) {
            self::$self = new self;
            return self::$self;
        } else {
           return self::$self;
        }
    }


    public function __clone()
    {
        throw new \Exception("this is a single instance", 1);
    }

    public static function tst($value)
    {
        echo $value."\n";
    }

    public static function __callStatic($name ,$args)
    {
        echo '__callStatic()'.$name.json_encode($args);
    }
}


 $name = Test::getInstance();

// new Test();

 // $cName = clone $name;

  $name->setName('name');

  echo $name->getName()


