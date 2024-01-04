# 1、vagrant

+ **重新生成homestead.yaml**

  ```
  init.bat
  ```

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

+ **开启关闭网站**

  + **关闭网站**

    ```
    php artisan down
    ```

  + 开启网站

    ```
    php artisan up
    ```

  + 即使在维护模式下，你也可以使用 secret 选项指定维护模式的绕过令牌：

    ```
    php artisan down --secret="1630542a-246b-4b66-afa1-dd72a4c43515"
    ```

  + 将应用程序置于维护模式后，您可以访问与该令牌匹配的应用程序 URL，Laravel 将向您的浏览器发出一个维护模式绕过 cookie：

    ```
    https://example.com/1630542a-246b-4b66-afa1-dd72a4c43515
    ```

  + 指定错误状态码及页面

    ```
    php artisan down --render="errors::503"
    ```

  + 重定向到页面地址

    ```
    php artisan down --redirect=/
    ```

  

  + **数据库**

  + 查看artisan 所有可用命令

    ```
    php artisan list make
    ```

  + 创建迁移文件

    ```
    php artisan make:migration add_activation_to_users_table --table=users
    ```

  + 迁移数据表命令

    ```
    php artisan migrate
    ```

  + 重置并填充数据库

    ```
    php artisan migrate:refresh --seed
    ```

  + 迁移文件字段管理

    ```
    {
        public function up()
        {
            Schema::create('statuses', function (Blueprint $table) {
                $table->increments('id');
                $table->text('content');
                $table->integer('user_id')->index();
                $table->index(['created_at']);
                $table->timestamps();
            });
        }
    
        public function down()
        {
            Schema::dropIfExists('statuses');
        }
    ```

  + 填充数据（模型工厂）

    ```
    php artisan make:factory StatusFactory
    php artisan make:seeder StatusesTableSeeder
    php artisan migrate:refresh --seed
    ```

    



+ **controllers**：

  ```
  php artisan make:controller StatusesController
  ```

+ 授权策略：

  + 生成授权策略：

    ```
    php artisan make:policy StatusPolicy
    ```

    

+ **禁用启用服务**

  ```
  services:
      - enabled:
          - "postgresql@12-main"
      - disabled:
          - "mysql"
  ```

* **安装可选功能**

  ```
  features:
      - blackfire:
          server_id: "server_id"
          server_token: "server_value"
          client_id: "client_id"
          client_token: "client_value"
      - cassandra: true
      - chronograf: true
      - couchdb: true
      - crystal: true
      - docker: true
      - elasticsearch:
          version: 7.9.0
      - gearman: true
      - golang: true
      - grafana: true
      - influxdb: true
      - mariadb: true
      - minio: true
      - mongodb: true
      - mysql8: true
      - neo4j: true
      - ohmyzsh: true
      - openresty: true
      - pm2: true
      - python: true
      - rabbitmq: true
      - solr: true
      - webdriver: true
      
  ```

  ```
     1、MariaDB：启用 MariaDB 将会移除 MySQL 并安装 MariaDB
     2、MongoDB：用户名为 homestead 及对应的密码为 secret
     3、Elasticsearch：如果你要安装 Elasticsearch，你可以在 Homestead.yaml 文件中添加 elasticsearch 选项并指定支持的版本号。可以仅包含主版本，也可以是某个具体的版本号（major.minor.patch）。默认安装会创建一个名为「homestead」的集群。 注意永远不要赋予 Elasticsearch 超过操作系统一半的内存，因此请保证你的 Homestead 至少分配了两倍于 Elasticsearch 的内存；操作文档：https://www.elastic.co/guide/en/elasticsearch/reference/current/index.html
     4、
  ```

  

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

# 9、redis

+ 配置密码

  ```
  vim /etc/redis/redis.conf
  ```

  ```
  bind 0.0.0.0
  requirepass 123456
  ```

+ 重启：

  ```
  修改好配置后，保存重启服务 sudo service redis restart。也可以用 ps -ef | grep redis 命令查看服务重启后的修改情况。
  ```

+ 数据库配置：.env

  ```
  REDIS_HOST=192.168.10.10
  REDIS_PASSWORD=123456
  REDIS_PORT=6379
  ```



# 10、laravel admin 命令

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

  

  
