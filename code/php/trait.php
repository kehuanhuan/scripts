<?php
class A {
    public $foo = 1;
}


$c = new A;
$d = &$c;    // $c ,$d是引用
             // ($c,$d) = <id>

$d->foo = 2;
echo $c->foo."\n";