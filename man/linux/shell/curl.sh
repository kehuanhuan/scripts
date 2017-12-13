#!/bin/sh

#-----------------------
#curl封装的接口调试工具
#author:kehuanhuan
#date:2017-04-18
#-----------------------

###说明####
#参数1 '请求URL, 如：www.fgcy.top'
#参数2 '请求参数：格式：name=abc&age=18&sex=男'
#参数3 '请求方式, '
#参数4  header设置 ：


url=''
method='POST'
useage="
   Usage: $0 agr1 agr2 agr3...

   --------------说明------------
   #arg1 必填               '请求URL，如：www.fgcy.top'
   #arg2 可选（默认：POST） '请求方式, 如：POST'
   #arg3 可选               '请求参数：格式：name=abc&age=18&sex=男'
   #arg4 可选             'header设置' ：如：'-H '
   --------------------
"

if [ -z $1 ] ; then
    exec echo "$useage"
exit
elif [ $1 ]
then
  url=$1
fi

if [ $2 ]
then
    method=$2
fi

if [ $method == 'GET' ]
then
    curl  -H "Accept: application/json;charset-UTF-8" -G -d "$3" -X $method "http://$url"
else
    curl  -i -H "Accept: application/json;charset=UTF-8" --data "$3" -X $method "http://$url"
fi
echo '\n'
