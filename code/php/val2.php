<?php //例三
//$tipi = array_fill(0, 3, 'php-internal');
//这里不再使用array_fill来填充 ，为什么？
$tipi[0] = 'php-internal';
$tipi[1] = 'php-internal';
// $tipi[2] = 'php-internal';
// var_dump(memory_get_usage());

// $copy = $tipi;
// debug_zval_dump('tipi');
// var_dump(memory_get_usage());

// $copy[0] = 'php-internal';
// xdebug_debug_zval('tipi', 'copy');
// var_dump(memory_get_usage());


$a = 'name';

$b = $a;
$c = $a;
$d = &$a;

 function a()
{
    // echo 'a';
    xdebug_call_function(0);
}

// unset($a);

// echo $b;
a();
