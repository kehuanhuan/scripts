#!/usr/bin/php
<?php

echo "********使用说明********\n";
echo "1.输入参数 time_to_date 时间戳转换为日期格式 \n";
echo "2.输入参数 date_to_time 日期转换为时间戳格式 \n";
echo "3.输入参数 now_time 当前时间戳 \n";
echo "4.输入参数 exit 退出 \n";

do {
   fwrite(STDOUT,"请输入参数:");
   $agr = trim(fgets(STDIN));

   switch($agr)
   {
	case 'time_to_date':
	    fwrite(STDOUT,"请输入时间戳:");
            $time = trim(fgets(STDIN));
	   echo date('Y-m-d H:i:s',$time)."\n";
		break;
	case 'date_to_time':
            fwrite(STDOUT,"请输入日期:");
            $time = trim(fgets(STDIN));
           echo strtotime($time)."\n";
		break;
	case 'now_time':
           echo date('Y-m-d H:i:s')."\n";
		break;
   }
} while($agr != 'exit');


