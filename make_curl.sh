#!/bin/sh

#-----------------------
#curl封装的接口调试工具
#author:kehuanhuan
#date:2017-04-18
#-----------------------

###说明####
#参数1 '请求URL'
#参数2 '请求方式'
#参数3 '请求参数：格式：name=abc&age=18&sex=男'
#参数4  header设置 ：

if [ $1 ]
then
  echo "您输入的url为：$1"
else
  echo "请输入URL"
fi


curl -i -H "Accept: application/json" --data "$3" -X $2 "http://$1" > curl_error.html
