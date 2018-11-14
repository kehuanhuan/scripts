<?php

$arr = ['b', 'b'=> 'this is b', 'c' => ['c', 'b'], ['a', 'b', 'c' => [1, 2, 3]]];

function CopyArr($arr, &$now)
{
    foreach ($arr as $k => $v) {
        if (!is_array($v)) {
            $now[$k] = $v;
        }else{
            CopyArr($v, $now[$k]);
        }
    }
}

$now;

CopyArr($arr, $now);

var_export($now);
