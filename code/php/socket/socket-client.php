<?php

error_reporting(E_ALL);
//设置无限请求超时时间
set_time_limit(0);

echo "<h2>TCP/IP Connection</h2>\n";

$ip = '172.20.0.6';
$port = 9099;

//创建socket
if(($socket = socket_create(AF_INET,SOCK_STREAM,SOL_TCP)) < 0) {
    echo "socket_create() 失败的原因是:".socket_strerror($socket)."\n";
    exit();
}
echo "OK. \n";

echo "试图连接 '$ip' 端口 '$port'...\n";

//连接socket
if(($result = socket_connect($socket, $ip, $port)) < 0){
    echo "socket_connect() 失败的原因是:".socket_strerror($sock)."\n";
    exit();
}
echo "连接OK\n";

$in = '';

$in .= "hello flycorn\n";
$out = '';

//写数据到socket缓存
if(!socket_write($socket, $in, strlen($in))) {
    echo "socket_write() 失败的原因是:".socket_strerror($sock)."\n";
    exit();
}
echo "发送到服务器信息成功！\n";
echo "发送的内容为:$in \n";

//读取指定长度的数据
while($out = socket_read($socket, 2048)) {
    echo "接收服务器回传信息成功！\n";
    echo "接收的内容为:",$out;
}

// sleep(15);

echo "关闭SOCKET...\n";
socket_close($socket);
echo "关闭OK\n";

