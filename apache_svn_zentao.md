# Title: Apache+SVN+����


## ˼·

&emsp;&emsp;�з��ύbugʱ���ڱ�ע��ע��bug��ID�š���Ŀ�š��������ȡsvn��־��Ϣ������ȡ�汾��ע�е�ID�ź���Ŀ�ŵ���Ϣ������Щ��Ϣ��������Ŀ�е�BUG��������Ӷ�ȷ��ĳһbug����˭��������˭��ɵȹ�����Ϣ��������ύbugʱ�������������ı�ע��ʽ��д���߲���д��ע��Ϣ���������޷��ж�ĳһbug����˭����ġ�

## Apache��svn�ں�

&emsp;&emsp;Apache��svn�Ӻ���Ϊ����svn�ܹ�ͨ��HTTP�Ϳ��Է��ʡ�����һ����Ŀ�ģ����������������ļ��п�������ͨ��HTTP����SVN��

### Apache������

&emsp;&emsp;�������ļ��м���������ģ�飬���ģ�鲻���ڣ�������Ҫ�û��Լ�ȥ��װ���ģ�飬����ͼ��ʾ��

![apache svn](images/apache-svn.png)

&emsp;&emsp;����SVN��HTTP������Ϣ������ͼ��

![apache svn 1](images/apache-svn-1.png)

&emsp;&emsp;������֤��ʽ��������֤�û������������о��巽���������൱�򵥡�ʵ�黷���У���֤�û��������Ҷ����ó���bailitop��

## SVN������

&emsp;&emsp;svn�ֿ�Ĵ������̴˴�����׸�������϶��о���ķ������˴������ص���SVN��Apache������ϵ����ù��̡������ᵽ��������SVN��HTTP��Ϣʱ����һ������ΪAuthSVNAccessFile�����ļ������вֿ��Ȩ�޹����ļ����൱��ÿ���ֿ����authz�ļ������û����洢��AuthUserFile������ͼ��AuthSVNAccessFile��������Ϣ��

![apache svn 2](images/apache-svn-2.png)

## ����������

&emsp;&emsp;���ȣ���Ҫ��װ���������尲װ���費���������˴����������á���module/svn/config.php��������Ϣ���£�

![apache svn 3](images/apache-svn-3.png)

&emsp;&emsp;�˴����õĲֿ⣨bnw��·��Ϊ`http://svn.bailitop.com/svn/bnw/`����������ö���ֿ⣬ֻ��Ҫ�������������Ϣȥ��ע�Ͳ����������Ϣ���ɣ�����ͼ��ʾ��

![apache svn 4](images/apache-svn-4.png)

&emsp;&emsp;`�˴�ע�⡱$i++;���Ǳ�����ڵġ�������ڼ����ֿ⡣`

### ������HTTP��Ϣ
&emsp;&emsp;������Ϣ�Ƚϼ򵥣�����ͼ��ʾ��

![apache svn 5](images/apache-svn-5.png)

### ��ʼ������ű�
&emsp;&emsp;����������binĿ¼��ִ��./init.sh�ű��������windowsϵͳ�Ļ�����Ҫִ��init.bat�ű�����������������php��ִ���ļ��ľ���·�����Լ���������ϵͳ��������Ϣ��

![apache svn 6](images/apache-svn-6.png)

&emsp;&emsp;�鿴syncsvn.sh�ļ����ݣ����£�

![apache svn 7](images/apache-svn-7.png)

&emsp;&emsp;����ļ���������ȡSVN��־��Ϣ����ȡ��Ϣ�Ľű��ļ���һ��������ڶ�ʱ������ֹ�ִ�и��ļ��������־��Ϣ������ͼ��

![apache svn 8](images/apache-svn-8.png)

### ����ʱ����

&emsp;&emsp;�ڳ�ʼ������ű�һ�����Ѿ��ᵽ���ڶ�ʱ�������Ϣ���˴�ֻ���þ���Ķ�ʱ������Ϣ��������ʾ��

![apache svn 9](images/apache-svn-9.png)

## �����ύ��ע��Ϣ��ʽ

&emsp;&emsp;�ڡ�˼·�������Ѿ��ᵽ�����ύ�ı�ע��ʽ���⡣���������ύsvn��ʱ����Ҫ�ڱ�ע����ע���˴��޸���ص����󣬻������񣬻���bug��id�������Ǿ���ĸ�ʽ�����Թٷ�����
1��`bug#123,234, 1234`��Ҳ������`bug:123,234  1234`��id�б�֮�䣬�ö��źͿո񶼿��ԡ�  
2��`story#123  task#123`  
bug, story, task�Ǳ����ע�ģ��ٷ���������ʵ���������ʾ����ֻ��һ���ֿ�ʱ��story��task���Ǳ����ע�ġ�

## ����

### ��ȡbug��ID��

&emsp;&emsp;�ύ��bug������bugҳ����õ��ύbug��ID�ţ�����ͼ��ʾ��

![apache svn 10](images/apache-svn-10.png)

&emsp;&emsp;�˴��ύbug��ID��Ϊ008��

### SVN�Ŀͻ���commit

&emsp;&emsp;SVN��commitʱ���������뱸ע��Ϣ�������뱸ע�Ļ�����עĬ��Ϊ�ա���������ϵͳҪ��������뱸ע��Ϣ��Ҫ��Ȼ�޷���ȡbug��SVN�汾�Ķ�Ӧ��ϵ������ͼ��ʾ��

![apache svn 11](images/apache-svn-11.png)

&emsp;&emsp;�ڱ�ע��Ϣ�����뱾���ᵽ��Ӧ��bug ID�š�  
&emsp;&emsp;��Σ�ȷ�Ͻ��������ͼ��ʾ��

![apache svn 12](images/apache-svn-12.png)

&emsp;&emsp;�����������֮�󣬵��bug���⣬������ʾ��bug ��Ӧ��SVN��Ϣ������ͼ��ʾ��

![apache svn 13](images/apache-svn-13.png)
