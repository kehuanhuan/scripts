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
method='GET'
agr=''
header="Accept: application/json"
header1=''
header2=''
data=''
i=1

get_use_age ()
{

cat <<EOF

    Usage: $0 -url= -M=

    --------------说明------------
    #-url 必填              '请求URL，如：www.fgcy.top'
    #-M 可选（默认：GET） '请求方式, 如：POST'
    #-D 可选               '请求参数：格式：name=abc&age=18&sex=男'
    #-H 可选             'header设置' ：如：'-H='
    --------------------

EOF

    exit 1
}

get_header_set ()
{
    s_header=$1

    length=${#s_header}

    if [[ $i == 1 ]] ; then
       header1=${s_header:3:length}
    elif [[ $i == 2 ]] ; then
       header2=${s_header:3:length}
    fi

    i=`expr $i + 1`;
}

get_data_set ()
{
    data=$1

    length=${#data}

    data=${data:3:length}
}

get_url_set ()
{
    url=$1

    length=${#url}

    url=${url:5:length}
}

get_method_set ()
{
    method=$1

    length=${#method}

    method=${method:3:length}
}

# 保存好原来的IFS的值，方便以后还原回来 处理参数中带空格
PRE_IFS=$IFS
# 设置IFS仅包括换行符
IFS=$'\n'

for arg in $@
do

case $arg in
  '-H'* )
  get_header_set $arg;
    ;;
  '-D'* )
  get_data_set $arg;
    ;;
  '-url'* )
  get_url_set $arg;
    ;;
  '-M'* )
  get_method_set $arg;
    ;;
esac

done

if test $# == 0;then
get_use_age;
exit 1;
fi

if [[ $header1 && $header2 ]]; then
  curl -H $header -H $header1 -H $header2  --data "$data" -X $method $url
elif [[ $header1 ]];then
  curl -H $header -H $header1  --data "$data" -X $method $url
elif [[ $header2 ]];then
  curl -H $header -H $header2  --data "$data" -X $method $url
else
  curl -H $header --data "$data" -X $method $url
fi






