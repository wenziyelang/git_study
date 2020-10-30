# 虚拟机管理
	+ 进入并启动虚拟机：
	```
	cd ~/Homestead && vagrant up
	```


列出所有的box：vagrant box list
登录：vagrant ssh
关闭虚拟机(windows命令行)：vagrant halt
销毁虚拟机：vagrant destroy --force



添加站点后：
	1、cd ~/Homestead
	2、vagrant reload --provision
		

修改项目PHP版本：
	1、cd /etc/nginx/sites-available
	2、修改PHP版本：
	3、service nginx reload

切换PHP版本：//貌似不起作用
	update-alternatives --display php 查看所有 php 版本和当前版本
	update-alternatives --config php 执行后，会列出当前 php 所有版本和编号，输入编号，切换到执行的版本



切换到root用户：sudo -i
修改root密码：sudo passwd root <1>


数据库：
	URL：127.0.0.1
	用户名：homestead
	密码：secret

xshell：
	url：192.168.10.10
	账号：root
	密码：1


更改composer镜像地址：composer config -g repo.packagist composer https://mirrors.aliyun.com/composer/
查看linux配置目录：ps  -ef | grep nginx
查看PHP配置目录：php -i|grep php.ini


nginx -t 查看 nginx.conf配置目录
虚拟主机配置目录：/etc/nginx/sites-enabled/*
vim /etc/nginx/sites-available/homestead.test
vim /etc/nginx/sites-available/another.test
vim /etc/nginx/sites-enabled/another.test
vim /etc/nginx/sites-enabled/homestead.test


查看错误日志：tail -f /var/log/nginx/another.test-error.log

查看php安装目录：which php
php安装目录：/etc/php/7.4/
php：session.save_path = "/var/lib/php/sessions"



fastcgi_pass unix:/var/run/php/php7.1-fpm.sock;
fastcgi_pass unix:/var/run/php/php7.1-fpm.sock;
fastcgi_pass unix:/var/run/php/php7.4-fpm.sock;


access_log /var/log/nginx/access.log;
error_log /var/log/nginx/error.log;
include /etc/nginx/conf.d/*.conf;
include 
/home/vagrant/.config/nginx/nginx.conf


更新lumen：在根目录composer update



#laravel命令
```
php artisan make:controller TestController
php artisan route:list
```
