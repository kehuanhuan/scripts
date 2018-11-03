#! /usr/bin/node



setTimeout(function() {
    console.log("进程 " + process.argv[2] + " 执行。" );
}, 20*1000);
