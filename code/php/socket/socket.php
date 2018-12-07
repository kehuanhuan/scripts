<?php

//设置无限请求超时时间
set_time_limit(0);

cli_set_process_title('php-server');

$ip = '0.0.0.0';
$port = 9099;

//创建socket
$sock = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);

if(!$sock) {
    echo "socket_create() 失败的原因是:".socket_strerror(socket_last_error())."\n";
    exit();
}
//把socket绑定在一个IP地址和端口上
$ret = socket_bind($sock,$ip,$port);
if(!$ret) {
    echo "socket_bind() 失败的原因是:".socket_strerror(socket_last_error())."\n";
    exit();
}
//监听由指定socket的所有连接
$ret = socket_listen($sock, 4);
if(!$ret) {
    echo "socket_listen() 失败的原因是:".socket_strerror(socket_last_error())."\n";
    exit();
}

//次数
$count = 0;
echo "server staring ...\n";
do{
    sleep(5);
    $msgsock = socket_accept($sock);

    //接收一个Socket连接
    if (!$msgsock) {
        echo "socket_accept() failed: reason: " . socket_strerror(socket_last_error()) . "\n";
        break;
    } else {
        //发送到客户端
        $msg = "测试成功! \n";

        socket_write($msgsock, $msg, strlen($msg));

        echo "测试成功了啊\n";
        // 获得客户端的输入
        $buf = socket_read($msgsock, 2048);

        $talkback = "收到的信息:$buf\n";
        echo $talkback;
        //第5次结束
        if(++$count >= 5){
            break;
        }
    }
    //关闭socket
    // socket_close($msgsock);
}while(true);
