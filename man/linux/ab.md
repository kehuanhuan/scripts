1.首先安装ab命令
sudo apt-get install apache2-utils
如果不行那就更新apt-get

sudo apt-get update
2.简单说明
然后就可以进行AB测试了

Usage: ab [options] [http[s]://hostname[:port]]/path

常用参数说明：

-n 总的请求数
-c 一次同时并发的请求数
总的请求数(n) = 次数 * 一次并发数(c)
3.运行 ab -n 100 -c 10 http://localhost/demo/ 简单测试本地的程序
Server Software:        Apache/2.4.7
Server Hostname:        192.168.199.122
Server Port:            80

Document Path:          /box/
Document Length:        1523 bytes

Concurrency Level:      10
// 整个测试持续的时间
Time taken for tests:   1.073 seconds
// 完成的请求数量
Complete requests:      100
Failed requests:        0
Total transferred:      202300 bytes
HTML transferred:       152300 bytes
// 平均每秒处理93个请求
Requests per second:    93.16 [#/sec] (mean)
// 平均每个请求的处理时间为107毫秒 一次10个并发为一次请求
Time per request:       107.346 [ms] (mean)
// 平均每个并发处理时间为10毫秒
Time per request:       10.735 [ms] (mean, across all concurrent requests)
Transfer rate:          184.04 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   1.1      0       4
Processing:    40  104  39.1     92     240
Waiting:       39   97  37.7     85     224
Total:         40  104  40.2     92     243

// 在这个请求中有50%在92毫秒中完成
Percentage of the requests served within a certain time (ms)
  50%     92
  66%     95
  75%    101
  80%    106
  90%    203
  95%    219
  98%    243
  99%    243
 100%    243 (longest request)
