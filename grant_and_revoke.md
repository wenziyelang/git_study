# Title: mysql的授权与撤销授权


## 授权语法

> `grant  权限 on 数据库对象  to  用户`

### 示例

1.grant 普通数据用户，查询、插入、更新、删除 数据库中所有表数据的权利
  
> grant  select  on  testdb.*  to  common_user@'%';  
grant  insert  on  testdb.*  to  common_user@'%';  
grant  update  on  testdb.*  to  common_user@'%';  
 grant  delete  on  testdb.*  to  common_user@'%';  

上面四条等价于下面一条命令：  
> grant  select,insert,update,delete  on  testdb.*  to  common_user@’%’; 
 
2.grant 操作 MySQL 外键权限
> grant  references  on  testdb.*  to  developer@'192.168.0.%';

3.grant 操作 MySQL 临时表权限  
> grant  create  tremporary  tables  on  testdb.*  to  developer@’%’;

4.grant 操作 MySQL 索引权限
> grant  index  on  testdb.*  to  developer@’192.168.0.%’;

5.grant 操作 MySQL 视图、查看视图源代码权限
> grant  create  view  on  testdb.*  to  developer@’192.168.0.%’;  
grant  show view  on  testdb.*  to  developer@’192.168.0.%’;

6.grant 作用在单个数据表上
> grant  select  on  testdb.orders  to  dba@localhost;

7.grant 作用在表中的列上
> grant  select(id,se,rank)  on  testdb.apache_log  to  dba@localhost;

8.grant 作用在存储过程、函数上
> grant  execute  on  procedure  testdb.pr_add  to  dba@localhost;  
grant  execute  on  function  testdb.fn_add  to  dba@localhost

## 查看授权

1.查看当前用户（自己）权限
> show  grants;

2.查看其他 MySQL 用户权限
> show  grants  for  dba@localhost;

## 撤销授权

撤销已经赋予给 MySQL 用户权限的权限，使用revoke命令，revoke 跟 grant 的语法差不多，只需要把关键字 “to” 换成 “from” 即可，例如：  
1.当对某个用户进行如下授权后
> grant  all  on  *.*  to  dba@localhost;

2.撤销上述已被授权的用户
> revoke  all  on  *.*  from  dba@localhost;




