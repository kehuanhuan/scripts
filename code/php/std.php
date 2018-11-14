<?php
echo "请输入内容:";
$jimmy = fgets(STDIN);
echo sprintf("输入的内容为: %s\n", $jimmy);

$demo = fopen('php://stdin', 'r');
echo "请输入: ";
$test = fread($demo, 12); //最多读取12个字符
echo sprintf("输入为: %s\n", $test);
fclose($demo);


fwrite(STDOUT, "通过STDOUT写入；\n");

$demo = fopen("php://stdout \n", "w");
fwrite($demo, "通过php://stdout写入；");
fclose($demo);