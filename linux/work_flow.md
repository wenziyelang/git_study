# Title: ��Ŀ����������淶


## ���ݵĿ�������

![workflow](images/workflow.png)

## git��֧ģ��(git flow)

![gitflow](images/gitflow.png)

** ��֧���� **  

��ʵ�ʿ����У�����Ӧ�ð��ռ�������ԭ����з�֧����  
���ȣ�master��֧Ӧ���Ƿǳ��ȶ��ģ�Ҳ���ǽ����������°汾��  
��Σ�ƽʱ�ɻ��dev��֧�ϣ�Ҳ����˵��dev��֧�ǲ��ȶ��ģ���ĳ��ʱ�򣬱���1.0�汾����ʱ���ٰ�dev��֧�ϲ���master�ϣ�master��֧����1.0�汾��

## github flow

����git flowΪ�λ�Ҫgithub flow������git flow�Ƚϸ��ӣ�������ÿ����Ŀ����Ҫ��ô����Ϊ�˼򻯹�������github�ƶ��˼򻯰��git flow����Ϊgithub flow��

**ʲô��github flow?**  

+ Anything in the `master` branch is deployable**(���ɷ�֧�����ȶ��ģ������ڷ����汾��**
+ To work on something new, create a descriptively named branch off of master (ie: new-oauth2-scopes)**(��������¹��ܣ�������֧�ϴ���һ�����־��й��������Եķ�֧�������֧new-oauth2-scopes)**
+ Commit to that branch locally and regularly push your work to the same named branch on the server**(���ֱ�����Զ�̷�֧����һ��)**
+ When you need feedback or help, or you think the branch is ready for merging, open a pull request**(һ�����ܿ�����ɣ�������֧���ͺϲ�����)**
+ After someone else has reviewed and signed off on the feature, you can merge it into master**(һ�����������ɣ������߼��ɽ�������)**
+ Once it is merged and pushed to ��master��, you can and should deploy immediatelely**(һ�����ϲ�������֧��ȥ����������Ҫ���̷ַ����� )**

## ��˾�����淶

+ ��˾�Ŀ�������������github flow
+ git��֧��������ʽ����:  `�û���_��֧��������_��Ŀģ������_��������`  
���磺bailitop�û����ڿ���һ��webϵͳ��api�ӿ��е�oauth2���ܣ���ô��֧����Ϊ: `bailitop_20150806_webapi_oauth2`
+ û��Ҫÿһ��С���ܻ����޸Ķ�����һ����֧��������Ҫ��ο���һ������
+ ����ķ�֧��ɾ����ɾ��ǰ��ȷ����֧�ϵ����������͵����ʵķ�֧��ȥ���������ݶ�ʧ
