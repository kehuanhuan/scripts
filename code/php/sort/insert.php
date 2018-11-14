<?php

function insert($arr)
{
    $len = count($arr);

    for ($i=1; $i < $len; $i++) {
        $tmp = $arr[$i];
        for ($j=$i - 1; $j >= 0; $j--) {
            if ($tmp < $arr[$j]) {
                $arr[$j+1] = $arr[$j];
                $arr[$j] = $tmp;
            } else {
                break;
            }
        }
    }

    return $arr;
}

$a = [4, 6, 3, 9, 11, 3, 6, 3, 20];

$r = insert($a);

var_export($r);