<?php

function bubbleSort($arr = [])
{
    $n = count($arr);

    for ($i=1; $i < $n; $i++) {
        for ($j=0; $j < $n - $i; $j++) {
           if( $arr[$j] > $arr[$j+1]){
                $tmp    = $arr[$j];
                $arr[$j] = $arr[$j+1];
                $arr[$j+1] = $tmp;
           }
        }
    }

    return $arr;
}

$arr = [3, 6, 9, 2, 1, 3, 4, 7, 10];

$a = bubbleSort($arr);

var_export($a);