# Title: mysql����Ȩ�볷����Ȩ


## ��Ȩ�﷨

> `grant  Ȩ�� on ���ݿ����  to  �û�`

### ʾ��

1.grant ��ͨ�����û�����ѯ�����롢���¡�ɾ�� ���ݿ������б����ݵ�Ȩ��
  
> grant  select  on  testdb.*  to  common_user@'%';  
grant  insert  on  testdb.*  to  common_user@'%';  
grant  update  on  testdb.*  to  common_user@'%';  
 grant  delete  on  testdb.*  to  common_user@'%';  

���������ȼ�������һ�����  
> grant  select,insert,update,delete  on  testdb.*  to  common_user@��%��; 
 
2.grant ���� MySQL ���Ȩ��
> grant  references  on  testdb.*  to  developer@'192.168.0.%';

3.grant ���� MySQL ��ʱ��Ȩ��  
> grant  create  tremporary  tables  on  testdb.*  to  developer@��%��;

4.grant ���� MySQL ����Ȩ��
> grant  index  on  testdb.*  to  developer@��192.168.0.%��;

5.grant ���� MySQL ��ͼ���鿴��ͼԴ����Ȩ��
> grant  create  view  on  testdb.*  to  developer@��192.168.0.%��;  
grant  show view  on  testdb.*  to  developer@��192.168.0.%��;

6.grant �����ڵ������ݱ���
> grant  select  on  testdb.orders  to  dba@localhost;

7.grant �����ڱ��е�����
> grant  select(id,se,rank)  on  testdb.apache_log  to  dba@localhost;

8.grant �����ڴ洢���̡�������
> grant  execute  on  procedure  testdb.pr_add  to  dba@localhost;  
grant  execute  on  function  testdb.fn_add  to  dba@localhost

## �鿴��Ȩ

1.�鿴��ǰ�û����Լ���Ȩ��
> show  grants;

2.�鿴���� MySQL �û�Ȩ��
> show  grants  for  dba@localhost;

## ������Ȩ

�����Ѿ������ MySQL �û�Ȩ�޵�Ȩ�ޣ�ʹ��revoke���revoke �� grant ���﷨��ֻ࣬��Ҫ�ѹؼ��� ��to�� ���� ��from�� ���ɣ����磺  
1.����ĳ���û�����������Ȩ��
> grant  all  on  *.*  to  dba@localhost;

2.���������ѱ���Ȩ���û�
> revoke  all  on  *.*  from  dba@localhost;




