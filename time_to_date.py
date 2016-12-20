#!/usr/bin/python
# -*- coding: UTF-8 -*- 
import sys;
import time;

print "********使用说明********";
print "1.输入参数 time_to_date 时间戳转换为日期格式";
print "2.输入参数 date_to_time 日期转换为时间戳格式";
print "3.输入参数 now_time 当前时间戳";
print "4.输入参数 exit 退出";

is_while = 1;
while is_while:
  str = raw_input("请输入参数：");
  if str == 'time_to_date':
      time_stmp = input("请输入时间戳：");
      time_s = time.localtime(time_stmp);
      print time.strftime("%Y-%m-%d %H:%M:%S",time_s);
  elif str == 'date_to_time':
      tmp = input("请输入日期（1970-01-01 00：00：00）：");
      #time_s = time.localtime(tmp);
      print time.mktime(time.strptime(tmp,"%Y-%m-%d %H:%M:%S"));
  elif str == 'now_time':
      print time.time();
  elif str == 'exit':
	sys.exit(0);

