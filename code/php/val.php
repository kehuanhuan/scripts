<?php

$a = 10;
$v = &$a;
$v1 = &$a;

echo $v;
// $v = 123;
// echo $a;  //123

// $v1 = 234;
// echo $a;  //234

// $b = 000;
// function foo(&$param) {
//     $param = 123;
// }
// foo($b);
// echo $b; //123;