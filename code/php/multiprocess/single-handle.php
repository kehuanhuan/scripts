<?php
//信号处理函数
function sig_handler($signo)
{

     switch ($signo) {
         case SIGTERM:
             // 处理SIGTERM信号
            echo 'this is 1';
             exit;
             break;
         case SIGHUP:
             //处理SIGHUP信号
          echo 'this is 2';
             break;
         case SIGUSR1:
             echo "Caught SIGUSR1...\n";
             break;
         default:
             // 处理所有其他信号
     }

}

echo "Installing signal handler...\n";

//安装信号处理器
pcntl_signal(SIGTERM, "sig_handler");
pcntl_signal(SIGHUP,  "sig_handler");
pcntl_signal(SIGUSR1, "sig_handler");

sleep(1000);