# Title: gitʹ������



## ���
git��Ŀǰ���������Ƚ��ķֲ�ʽ�汾����ϵͳ��û��֮һ����  
��ƪ�ĵ���Ҫ������git����ʹ�õĲ�����������պ�������ѯ�������GITһ���������������ѧϰ��ѩ���[git�̳�](http://www.liaoxuefeng.com/wiki/0013739516305929606dd18361248578c67b8067c8c017b000)���˽̳�ͨ���׶����ǳ��ʺϳ�ѧ�ߡ�
## �ص�
+ �߶˴����ϵ���
+ ������
+ ��Ч��

## git��������

![git 1](images/git-1.png)

## ��������

+ ����ֿ⣺ `git clone <�ֿ��ַ>`
+ �鿴Զ�ֿ̲⣺`git remote -v `
+ ���Զ�ֿ̲⣺` git remote add [����] <Զ�ֿ̲��ַ>`
+ ɾ��Զ�ֿ̲⣺`git remote rm <Զ�ֿ̲��ַ>`
+ �޸�Զ�ֿ̲⣺`git remote set-url --push [����] <Զ�ֿ̲��ַ>`
+ ��ȡԶ�ֿ̲⣺`git pull [Զ�̵�ַ]  [Զ�̷�֧]:[���ط�֧]`
+ ����Զ�ֿ̲⣺`git push [Զ�̵�ַ]  [���ط�֧]:[Զ�̷�֧]`
+ �ύ���ݴ�����`git add <�ļ���>`
+ �ύ����֧��`git commit -m "your message"`

## ��֧��ز�������

+ �鿴���ط�֧��`git branch`
+ �鿴Զ�̷�֧��`git branch -r`
+ �������ط�֧��`git branch <����>`
+ �л���֧��`git checkout <����>`
+ �����·�֧�������л����·�֧��ȥ��`git checkout -b <����>`
+ ɾ�����ط�֧��`git branch -d <����>`
+ ǿ��ɾ�����ط�֧��`git branch -D <����>`
+ ɾ��Զ�̷�֧��`git push [Զ�̵�ַ] :heads/[name] �� git push [Զ�̵�ַ] :<name>`
+ �ϲ���֧��`git merge <����>`
+ ����Զ�̷�֧�����ط�֧push��Զ�̣���`git push origin <name>`

## �汾(tag)�����������

+ �鿴�汾��`git tag`
+ �����汾��`git tag <name>`
+ ɾ���汾��`git tag -d <name>`
+ �鿴Զ�̰汾��`git tag -r`
+ ����Զ�̰汾�����ذ汾push��Զ�̣���git push origin <name>`
+ ɾ��Զ�̰汾��git push origin :refs/tags/[name]`
+ �ϲ�Զ�ֿ̲��tag�����أ�`git pull origin --tags`
+ �ϴ�����tag��Զ�ֿ̲⣺`git push origin --tags`
+ ������ע�͵�tag��`git tag <name> -m "your message"`

## ���غϲ�������������

```
git checkout develop 
git status 
git pull origin develop 
git checkout master 
git pull origin master 
git merge �Cno-ff develop -m "�ϲ��汾" 	##�ϲ��汾���� develop ��֧���ݺϲ��� master ��֧��
git push origin master 					##���� master ��֧���ݵ�Զ�� master ��֧
```

`--no-ff`����ʹ��fast-forward��ʽ�ϲ���������֧��commit��ʷ
`--squash`��ʹ��squash��ʽ�ϲ����Ѷ�η�֧commit��ʷѹ��Ϊһ��



## �����޸ĵ�

+ �鿴һ�·�֧�ϲ���־��git log --graph --pretty=oneline --abbrev-commit 

+ �ص���ȥ�汾��	git reset --hard master@{1}

+ �޸��ˣ�û��git add�����ύ�� �볷������޸ģ�git checkout a.txt or /src/

+ �޸��ˣ���git add��git reset a.txt

+ ������ĳһ���汾�����ǵ�ǰ�ݴ��������������볷����git reset --soft commitId

+ ����޸���ĳ�����ļ����ݴ������볷����ĳ��commit��git reset --hard commitId

## ����һЩ�ļ����ļ��в��ύ
�ڲֿ��Ŀ¼�´���һ����Ϊ��.gitignore�����ļ���������д�벻��Ҫ���ļ��������ļ���ÿ��Ԫ��ռһ�м��ɣ�������ʾ��
```shell
target
cache
*.jpg
```

## ��֧����

+ ����֧ master
+ ������֧ develop 
+ ���ܷ�֧ feature 
+ Ԥ������֧  release
+ bug ��֧ fixbug
+ ������֧ other
