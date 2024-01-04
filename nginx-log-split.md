# Title: nginx的日志分隔


## 脚本
&emsp;&emsp;默认情况下，nginx是不分隔访问日志的，如果想让nginx进行按天分隔的话，需要手动写脚本进行分隔，当然也有其他方法，但个人认为这种方法比较方法和简洁，便于理解，于是有了下面的脚本：
```shell
#!/bin/sh
# description: cut nginx log files
# date: 16/7/2014

log_dir="www  usa  usabk  usagz  usayjs  liuxue  kaoshi  uploadfile  uk  v  wap  statics"
log_files_dir="/var/log/nginx/"
access_suffix="access.log"
error_suffix="error.log"
nginx_pid="/var/run/nginx.pid"
for i in $log_dir
do
mv  "${log_files_dir}${i}/${i}-${access_suffix}"  "${log_files_dir}${i}/${i}-${access_suffix}-`date --date="yesterday" +%F`"
mv  "${log_files_dir}${i}/${i}-${error_suffix}"  "${log_files_dir}${i}/${i}-${error_suffix}-`date --date="yesterday" +%F`"
#delete files over 30 days
/bin/find ${log_files_dir}${i} -mtime +30 -exec rm -f {} \;
done
/bin/kill -USR1 `cat ${nginx_pid}`
```
## 思路
&emsp;&emsp;**基本思路：**将当天的访问日志及错误日志通过mv指令更改为其他名称，同时将信号发给nginx主进程，使它重新打开一个访问日志文件和错误日专文件。  
&emsp;&emsp;**注意：**脚本中的最后一行必须存在，要不然你会发现日志中的日期分隔不对，给人一种时间差的感觉。其实是因为mv指令虽更改了名称，但是打开的文件描述符并没有更改，所以在一定的时间内还会有数据写入到文件描述符指定的文件里，这就给人一种时间不对的错觉。通过将USR1信号发给nginx主进程，可以强制nginx重新打开一个访问日志文件和错误日专文件

