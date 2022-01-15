# 1、vagrant

*  __进入并启动虚拟机：__
	
	```
	cd ~/Homestead && vagrant up
	```
	
* __列出所有的box：__

  ```
  vagrant box list
  ```

+ __更新box：__

  ```
  vagrant box update
  ```
  
+ **删除指定版本box**

  ```
  vagrant box remove laravel/homestead --box-version 9.5.1
  ```

* __登录：__

  ```
  vagrant ssh
  ```

* __关闭虚拟机(windows命令行)：__

  ```
  vagrant halt
  ```

* __销毁虚拟机：__

  ```
  vagrant destroy --force
  ```

* __切换到root用户：__

  ```
  sudo -i 
  ```

* __修改root密码：__

  ```
  sudo passwd root <1>
  ```
  
* **apt install lrzsz**

  ```
  apt install lrzsz
  ```


# 2、PHP

+ __查看PHP配置目录：__

  ```
  php -i|grep php.ini
  ```

+ __查看php安装目录：__

  ```
  which php
  ```

- __php安装目录：__

  ```
  /etc/php/7.4/
  ```

* __重启PHP__

  ```
  service php7.2-fpm restart
  ```

* __PHP fpm sock__
    ```
    fastcgi_pass unix:/var/run/php/php7.1-fpm.sock;
    fastcgi_pass unix:/var/run/php/php7.1-fpm.sock;
    fastcgi_pass unix:/var/run/php/php7.4-fpm.sock;
    ```
* **查 php 版本**

  ```
  update-alternatives --display php
  ```

* **设置PHP版本**

  ```
  update-alternatives --config php
  ```
  
# 3、nginx 

* **添加站点后配置步骤：**

  ```
  cd ~/Homestead
  vagrant reload --provision
  cd /etc/nginx/sites-available  //修改项目PHP版本
  service nginx reload //重新加载配置文件
  ```

* **查看nginx是否启动**

  ```
  ps -ef | grep nginx 
  ```

+ __查看nginx配置目录：__

  ```
  ps  -ef | grep nginx
  ```

+ **查看 nginx.conf配置目录**

  ```
  `nginx -t`
  ```
* __虚拟主机配置目录：__
    ```
    /etc/nginx/sites-enabled/*
    vim /etc/nginx/sites-available/homestead.test
    vim /etc/nginx/sites-available/another.test
    vim /etc/nginx/sites-enabled/another.test
    vim /etc/nginx/sites-enabled/homestead.test
    ```

* __查看错误日志：__

    ```
    tail -f /var/log/nginx/another.test-error.log
    ```


* __LOGS__
    ```
    access_log /var/log/nginx/access.log;
    error_log /var/log/nginx/error.log;
    include /etc/nginx/conf.d/*.conf;
    include 
    /home/vagrant/.config/nginx/nginx.conf
    ```

# 4、composer

+ __更改composer镜像地址：__

  ```
  composer config -g repo.packagist composer https://mirrors.aliyun.com/composer/
  ```
  
+ **更新扩展**

  ```
  composer update
  ```

+ **指定PHP版本更新composer**

  ```
  /usr/local/php56/bin/php /usr/local/bin/composer update
  ```


# 5、laravel命令

* **创建controller**

  ```
  php artisan make:controller TestController
  ```

* **列出所有的controller**

  ```
  php artisan route:list
  ```

# 6、数据库

    URL：127.0.0.1
    username：homestead
    password：secret
    port：33060

# 7、xshell：

```
url：192.168.10.10
账号：root
密码：1
```


# 8、端口
	SSH：2222 -> 转发到 22
	ngrok UI：4040 -> 转发到 4040
	HTTP：8000 -> 转发到 80
	HTTPS：44300 -> 转发到 443
	MySQL：33060 -> 转发到 3306
	PostgreSQL：54320 -> 转发到 5432
	MongoDB：27017 -> 转发到 27017
	Mailhog：8025 -> 转发到 8025
	Minio：9600 -> 转发到 9600



# 9、laravel admin 命令

+ **安装laravel**

  + **通过composer安装**

    ```
    composer create-project laravel/laravel example-app
    
    cd example-app
    
    php artisan serve
    ```

  + **通过laravel 安装器**

    ```
    composer global require laravel/installer
    
    laravel new example-app
    
    cd example-app
    
    php artisan serve
    ```

+ **安装laravel admin**：

  + **下载**
  
    ```
    composer require encore/laravel-admin:2.*
    ```
  
  + **发布资源**
  
    ```
    php artisan vendor:publish --provider="Encore\Admin\AdminServiceProvider"
    ```
  
  + **数据库配置**
  
     在该命令会生成配置文件`config/admin.php`，可以在里面修改安装的地址、数据库连接、以及表名，建议都是用默认配置不修改。
  
      然后运行下面的命令完成安装：账号密码：admin，地址：http://localhost:8000/admin/
  
  + **安装**
  
    ```
    php artisan admin:install
    ```

+ **创建model**

  ```
  # 生成模型
  php artisan make:model Flight
  
  # 生成模型和 Flight工厂类...
  php artisan make:model Flight --factory
  php artisan make:model Flight -f
  
  # 生成模型和 Flight 数据填充类...
  php artisan make:model Flight --seed
  php artisan make:model Flight -s
  
  # 生成模型和 Flight 控制器类...
  php artisan make:model Flight --controller
  php artisan make:model Flight -c
  
  # 生成模型和迁移(m)、工厂(f)、数据填充(s)、控制器(c)...
  php artisan make:model Flight -mfsc
  ```

+ **创建controller**

  ```
  php artisan admin:make MoviesController --model=App\\Models\\Movies
  ```

+ **添加路由：**在路由配置文件`app/Admin/routes.php`里添加一行：

  ```
  $router->resource('users', UserController::class);
  ```

+ **菜单管理：** http://localhost:8000/admin/auth/menu

  

  
