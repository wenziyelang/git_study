# 虚拟机管理

*  __进入并启动虚拟机：__
	` cd ~/Homestead && vagrant up`

* __列出所有的box：__
	`vagrant box list`
* __登录：__
	`vagrant ssh`
* __关闭虚拟机(windows命令行)：__
	`vagrant halt`
* __销毁虚拟机：__
	`vagrant destroy --force`
* __切换到root用户：__
	`sudo -i `
* __修改root密码：__
`sudo passwd root <1>`
*  __更改composer镜像地址：__
`composer config -g repo.packagist composer https://mirrors.aliyun.com/composer/`

* __查看linux配置目录：__
	`ps  -ef | grep nginx`
* __查看PHP配置目录：__
	`php -i|grep php.ini`
*  ____查看 nginx.conf配置目录__
	`nginx -t`
* __虚拟主机配置目录：__
    ```
    /etc/nginx/sites-enabled/*
    vim /etc/nginx/sites-available/homestead.test
    vim /etc/nginx/sites-available/another.test
    vim /etc/nginx/sites-enabled/another.test
    vim /etc/nginx/sites-enabled/homestead.test
    ```

* __查看错误日志：__
	`tail -f /var/log/nginx/another.test-error.log`

+ __查看php安装目录：__
	`which php`
- __php安装目录：__
	`/etc/php/7.4/`

* __PHP fpm sock__
    ```
    fastcgi_pass unix:/var/run/php/php7.1-fpm.sock;
    fastcgi_pass unix:/var/run/php/php7.1-fpm.sock;
    fastcgi_pass unix:/var/run/php/php7.4-fpm.sock;
    ```
* __LOGS__
    ```
    access_log /var/log/nginx/access.log;
    error_log /var/log/nginx/error.log;
    include /etc/nginx/conf.d/*.conf;
    include 
    /home/vagrant/.config/nginx/nginx.conf
    ```

# 站点配置

* 添加站点后配置步骤：
```
cd ~/Homestead
vagrant reload --provision
cd /etc/nginx/sites-available  //修改项目PHP版本
service nginx reload //重新加载配置文件
```
* 查看所有 php 版本和当前版本
```
update-alternatives --display php
```
* 设置PHP版本，执行后，会列出当前 php 所有版本和编号，输入编号，切换到执行的版本
```
update-alternatives --config php
```

# laravel命令
* 更新lumen：在根目录执行以下命令：
```
composer update
```
* 创建controller
```
php artisan make:controller TestController
```
* 列出所有的controller
```
php artisan route:list
```


# 数据库
    URL：127.0.0.1
    username：homestead
    password：secret

# xshell：
    url：192.168.10.10
    账号：root
    密码：1





