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

if [ -z $1 ]
then
  echo "--------------说明------------"
  echo "#参数1 '请求URL，如：www.fgcy.top'"
  echo "#参数2 '请求方式, 如：POST' "
  echo "#参数3 '请求参数：格式：name=abc&age=18&sex=男'"
  echo "#参数4  header设置 ："
  echo "-------------------- "
  exit
elif [ $1 ]
then
  url=$1
fi

if [ $3 ]
then
 method=$3
fi

curl -i -H "Accept: application/json" --data "$2" -X $method "http://$url"
echo '\n'
