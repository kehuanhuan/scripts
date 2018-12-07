<?php

cli_set_process_title('process_a');

$pidA = pcntl_fork();

//父进程
if ($pidA > 0) {
    sleep(2);
    print "father exit".PHP_EOL;
    exit(0);
} else if ($pidA < 0) {
    exit(1);
} else if ($pidA == 0) { //子进程

    cli_set_process_title('process_b');

    if (-1 === posix_setsid()) {
        exit(2);
    }
    //安装信号处理器
    // declare(ticks = 1);
    // pcntl_signal(SIGHUP,  "sig_handler");
    while (true) {
        sleep(10);
        print "this is child".PHP_EOL;
    }
}

function sig_handler($signo)
{

     switch ($signo) {
         case SIGCHLD:
            var_export('SIGCHLD');
            break;
         case SIGTERM:
             // 处理SIGTERM信号
         var_export('SIGTERM');
             exit;
             break;
         case SIGHUP:
             //处理SIGHUP信号
         print 'SIGHUP';
             break;
         default:
             // 处理所有其他信号
     }

}



