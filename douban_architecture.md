# Title: �����������ܹ��ķ�չ����


Author: ��ǿ��(�����������ܹ�ʦ)
## ���������

+ 2005��3������
+ �Է���ͷ���Ϊ���ĵ�����
+ ���顢��Ӱ�����֡�С�顢ͬ�ǡ��ŵ�
+ �ҵĶ��硢����

![douban](images/douban.png)

## һЩ����

+ 2.8Mע���û���Լ1/4��Ծ�û�
+ ǧ�򼶷�ע���û�
+ 20M��̬����/�죬��ֵ500~600/sec
+ 23̨��ͨPC������(1U*15/2U*8)
+ 12̨�ṩ���Ϸ���
+ 38G memcached

## ��������

+ ��̨1U������ (frodo)
 + ����AMD Athlon 64 1.8GHz
 + 1G�ڴ棬160G SATA*2
+ Gentoo Linux
+ MySQL 5
+ Quixote (a Python web framework)
+ Lighttpd + SCGI (shire)
+ Memcached (!)

![douban](images/douban-1.png)

## Gentoo Linux

+ ����ά��
 + emerge mysql
 + ebuild ���ڹ��� patch
+ ֻ��װ��Ҫ�Ķ���
+ ��ȫ��
 + GLSA(Gentoo Linux Security Advisories)

## MySQL

+ The world��s most popular open source database
+ д�ٶ���/д����� ==> MyISAM
+ ��д������ ==> InnoDB
+ Replicate for backup

## Python

+ ����Ѹ��
+ Battery Included
+ �����������
+ �����ɳ���
 + CPUG: http://python.cn/

## Quixote

+ �򵥣�����������ʵ��REST����URL
+ ��ʱ��û��Django, TurboGears, Pylons��Щѡ��ֻ��һ�����ص�ZOPE
+ http://www.douban.com/subject/1000001
```python
# luz/subject/__init__.py
def _q_lookup(request, name):
      subject = get_subject(name)
      return lambda req: subject_ui(req, subject)
# luz/subject/subject_ui.ptl
def subject_ui [html] (request, subject):
      site_header(request)
      ��<h1>%s</h1>�� % subject.title
      site_footer(request)
```

## Lighttpd

+ �ܺõĶ�̬�;�̬����
+ ԭ��SCGI֧��
 + SCGI: һ���򻯰汾��FastCGI����Quixote�����߿���
+ ���е�����ͨ��80�˿ڵ�lighttpd���̷ַ�����̬������SCGI��localhost�ϵ�Quixote���̡�

## Memcache

+ �����������ʹ�ã���Ч����MySQL����
+ ��libmemcache����python��װ��ʹ��Pyrex���������Ǵ�python���3x+
```python
def get_subject(subject_id):
      subject = mc.get(��s:��+subject_id)
      if subject is None:
           store.farm.execute("select xxx, xxx from subject where id=%s",subject_id)
           subject = Subject( *store.farm.fetchone())
           mc.set( 's:' +subject_id,subject)
      return subject
```

## �������

+ 1.2M��̬����/��
+ ����IO��Ϊƿ��
+ ��ҪѰ���»���

## �������

+ ������̨1U������
 + pippin �� meriadoc (�����merry)
 + ˫��, 4G�ڴ棬250G SATA*3
+ һ̨��ΪӦ�÷�������һ̨��Ϊ���ݿ������
+ Ǩ�Ƶ�˫��˫IP������ʹ��DNS������ͬ����IP -_-b
+ ��ʼ����Э��������frodo��Ϊ�����û�(subversion, trac, etc...)

![douban 2](images/douban-2.png)

## ���㷢��

+ ���ݿ���ڴ���������Ӱ���ش�
 + innodb_buffer_pool_size
+ �������Ѱ���ٶȱ�����������Ҫ
+ ����������IP�ηֲ��ܲ�����

## �����ֳ���

+ 1.5M��̬����/�죬��δ������ƿ��
+ ���������ף�Ƶ������
+ IP�ηֲ����ݲ����ף��û���ӳ���ʻ���

## �������

+ �������׵Ļ��������ߵ�IP(BGP)
+ ������һ̨�·����� (arwen)
 + 74G 1wת SATA * 3
 + ��Ϊ���ݿ������
+ ��ʼʹ��ר�ŵķ���������̨����

![douban 3](images/douban-3.png)

## �������

+ 2M��̬����/��
+  ��̬�ļ��������IO��Ϊƿ��
 + �ϰ����СͼƬ���û�ͷ�񡢷���ͼƬ, etc...��
+ ���ݿ�������ӽ�ƿ��

## �������

+ ������̨��������˫�ˣ�4G��250G SATA*3
+ ��ͼƬ��һ����Ŀ¼�зֳ�10000���ļ�һ��Ŀ¼
 + mod_rewrite����URL����
+ ������ͼƬlighttpd���̣�����mod_memcacheģ�飬����СͼƬ
 + ��С����IO��ҳ����ʵ�Ӱ��
+ ��Ӧ�÷����web������������ȥ
 + �Ѹ�����ڴ�������̬�ļ�����
+ ����һ��ֻ�����ݿ�

![douban 4](images/douban-4.png)

## ֻ�����ݿ�

+ store����farmr���ԣ�Ϊһ�����õ�ֻ�����ݿ��α�
+ ͷ�۵�replicate delay����
 + ���⸴����Ҫʱ��
 + �����������һ��������������Ҫ�����ݣ��������ݺ�ˢ��ҳ�棩
 + �Ӹ�����ᵼ��cache���ŵ��Ǿ�����
   + �����¼���
+ ����������������ݿ����Ԥ�ڿ��ܻ������õ�������£�����ˢ�»���
 + ......��������but it works

## ����replicate delay����������¼�
```python 
def get_subject(sid):
      sbj = mc.get(��s:��+sid)
      if sbj is None:
            sbj = flush_subject(sid, store.farmr)
            return sbj
def flush_subject(sid, cursor=None):
      cursor = cursor or store.farm
      cursor.execute(��select ... from subject��)
      subject = Subject(*cursor.fetchone())
      mc.set(��s:��+sid, subject)
      return subject
def update_subject(subject, props):
     store.farm.execute(��update subject ...��)
     store.farm.connection.commit()
     flush_subject(subject.id, store.farm)
```

## �������

+ 2.5M��̬����/��
+ ���ݿ���̿ռ䲻����
 + ����/�ŵ��������Ӵ�
+ SATA�̹����ʸ�
+ ���ݿ�ѹ������

## �������

+ Scale Up��������̨1U������
 + 16G�ڴ棬147G SCSI *2 + 500G SATA
 + SCSI �� RAID-0
+ ��MySQL Slave����֤����
+ ����memcached�ڵ���Ŀ
+ ���е�MyISAM����ΪInnoDB��
 + ����ڴ�����Ч��
+ ��ȫ����������Sphinx

![douban 5](images/douban-5.png)

## �������

+ 5.2M��̬����/��
+ ͼƬ�������ó�Ϊ���ɱ�
+ Web�������Ĵ���IO���ǻ�Ӱ�춯̬ҳ������
+ Ӧ�÷�����������������
+ ����ռ䲻����

## �������

+ ���Ļ�������һЩ :)
 + �е�ͼƬ����
 + ��̨�����ھ����
 + ���ֱ���
+ ����3̨1U��������4�ˣ�32G�ڴ棬1T SATA * 3
+ �Ż�ǰ�ˣ����� otho.douban.com �� lotho.douban.com ����
 + lighttpd 1.5 with aio support
 + ����LVS
+ Scale Up: Ӧ�÷������ڴ����� 4G -> 8G

![douban 6](images/douban-6.png)
![douban 7](images/douban-7.png)

## �������

+ 6.4M��̬����/�� (5M PV)
+ Ӧ�÷�������Ϊƿ��
 + �ڴ棺ռ�������������ƺ����ڴ�й¶
 + CPU��memcache�������л�/�����л�

## �������

+ �ڶ�̨Ӧ�÷���������
 + lighttpd��mod_scgiֻ��round-robin
 + lighttpd 1.5���ȶ�
 + mod_proxy
   + proxy.balance = fair (load based, passive balancing)  
+ ������ռ���ڴ泬����ֵ����ǰ������ɺ���ɱ
+ ʹ��spread�ۺ���־

![douban 8](images/douban-8.png)

## �������

+ 11M��̬����/�죨3̨Ӧ�÷�������
+ �����д���Ϊ��̨�����ƿ��
+ Sphinx�Ķ����Բ���
+ ����Ʒ�����У���Ҫ���ͼƬ�洢����
+ �������� ��վ�����������˴������ӵò�������loadȴ����

## �������

+ ���ݿ�ֿ�
 + �ŵ���ر��������
 + �����ھ���ر�������������������򣬱���ֻ��
+ Sphinx -> Xapian
+ ʹ��MogileFS
+ libmemcache -> libmemcached��ʹ��consistent hash����memcache��������
 + ����libmemcached��consistent hash���bug
+ Ӧ�÷������������ĺ�CPU
 + ����libmemcached��failover���bug
+ ��nginx���lighttpd��load balance
+ ��������������spread����
 + �ĳ���nginx��¼��־

![douban 9](images/douban-9.png)

## �����ݿ�����

+ ����ȫ��Ψһ��ά��һ�����������ݿ��ӳ��
+ store.farm[r] -> store.get_cursor(table=��xxx��,ro=True/False)
```python 
def flush_subject(sid, ro=False):
      cursor = store.get_cursor(table=��subject��, ro=ro)
      cursor.execute(��select ... from subject��)
      subject = Subject( *cursor.fetchone())
      mc.set(��s:��+sid, subject)
      return subject
```
+ �����ݿ��Ų�������ף����������ƽ�⸺��Ҳ�������

![douban 10](images/douban-10.png)
![douban 11](images/douban-11.png)

## �������

+ 13M��̬����/��
+ �ƻ������о�̬ͼƬ������MogileFS
 + �ļ�С��������Tracker DB���ܳ�Ϊƿ��
+ ����Ʒ���ܻ�ӭ���洢�ռ俪ʼ����

## �������

+ ����8̨�·�����
 + 32G�ڴ棬�ĺ�CPU
 + (300G SCSI��2 + 1T SATA) �� 3
 + (1T SATA �� 3) �� 5
 + 6̨������2̨���
+ ����DoubanFS

## DoubanFS

+ û���������ݿ⣬ֱ�Ӱ����ļ���hash�������ڽڵ㣬�������Ը���
+ ����hashֵ���Ŀ¼����ÿ���ڵ㸺��һ��hashֵ����
+ ��ʱͬ���������ļ��޸�ʱ���Merkle Tree
+ ����consistent hash������ɾ�ڵ�����������ƶ���
+ WebDAV��Ϊ��д�ӿ�
+ ������ΪMogileFS��3����д����Ϊ50��

![douban 12](images/douban-12.png)
![douban 13](images/douban-13.png)
![douban 14](images/douban-14.png)

## �������

+ 16M��̬����/��
+ ���ݿ���ı��ֶ�����Ӱ�������ݿ�����
+ DoubanFS��СͼƬ����IO����
+ ���ݿ������Ҫ�����

## �������

+ ����DoubanDB
 + ���õ�������
 + ���ı��ֶ��Ƴ���MySQL�����ܵõ���ǿ
+ MySQL˫Master����
 + failover����
 + ���replicate delay����

## DoubanDB

+ �ֲ�ʽKey-Value���ݿ�
+ ��Amazon Dynamo�����У�����һЩ��
+ �����ӿڣ�set(key, value), get(key), delete(key)
+ memcacheЭ����Ϊ��д�ӿ�
+ ������Merkle Tree�������ڴ棬���Ϊ���ڴ����ļ�
+ Consistent Hash
+ ��TokyoCabinet��Ϊ�ײ�洢
+ ���ݿ��еĴ��ı��ֶν���DoubanDB
+ DoubanFS 2.0 ���� DoubanDB ʵ��

![douban 15](images/douban-15.png)
![douban 16](images/douban-16.png)

## ���µ�һЩ�Ķ�

+ ��DoubanFS�������ھ�����ƻر�������
 + ���ļ��ϴ����̺ʹ���
 + ���õ�����Ӳ����Դ
+ ʹ��ngnix��Ϊ��ǰ��
+ www.douban.comҲ����LVS
+ ʹ��RabbitMQ����spread

## һЩ����

+ ��Ǯ�����ڴ�����ֵ�õ�
+ �������õ�profile���ߣ�������֮
+ memcache�������ۣ���ϸ����cache�Ķ����С�ͷ��ʷ�ʽ
+ �������ݿ��join����
+ �ڲ�Ʒ�����������Ա�������Ĳ�ѯ
+ ��ϸ���ǰ��̨����


