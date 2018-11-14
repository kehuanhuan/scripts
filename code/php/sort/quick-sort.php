<?php


function quickSort($arr) {
    // 先设定结束条件，判断是否需要继续进行
    if(count($arr) <= 1) {
        return $arr;
    }

    // 选择第一个元素作为基准元素
    $baseValue = $arr[0];

    // 初始化小于基准元素的左数组
    $leftArray = array();

    // 初始化大于基准元素的右数组
    $rightArray = array();

    // 遍历除基准元素外的所有元素，按照大小关系放入左右数组内
    array_shift($arr);
    foreach ($arr as $value) {
        if ($value < $baseValue) {
            $leftArray[] = $value;
        } else {
            $rightArray[] = $value;
        }
    }

    // 再分别对左右数组进行相同的排序
    $leftArray = quickSort($leftArray);
    $rightArray = quickSort($rightArray);

    // 合并基准元素和左右数组
    return array_merge($leftArray, array($baseValue), $rightArray);
}


$arr = [4,5,8,3,12, 90, 45, 34];

var_export(quickSort($arr));