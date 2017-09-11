<?php

require 'vendor/autoload.php';


class Base {
    public function sayHello() {
        echo 'Hello ';
    }
}

trait SayWorld {
    public function sayHello() {
        parent::sayHello();
        echo 'World!';
    }
}

class MyHelloWorld {
    use SayWorld;

    public function sayHelloo() {
        echo 'Hello ';
    }
}

$o = new MyHelloWorld();
$o->sayHelloo();
