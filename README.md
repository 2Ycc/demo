# message board
my first message board demo
login 为主登陆界面

##### 1、（下载安装xampp）打开apache与mysql。

##### 2、建立名为“me_message”的数据库，并建立名为“user”与“msg”的表：

~~~sql
CREATE DATABASE me_message
~~~

~~~sql
CREATE TABLE users 
(
id  int(10) NOT NULL AUTO_INCREMENT ,
username  varchar(100) NOT NULL DEFAULT '' ,
password  char(32) NOT NULL ,
PRIMARY KEY (`id`)
);
~~~

~~~sql
CREATE TABLE msg
(
id  int(10) NOT NULL AUTO_INCREMENT ,
content  varchar(255) NOT NULL DEFAULT '' ,
user  varchar(100) NOT NULL DEFAULT'',
intime int(10) NOT NULL DEFAULT 0,
PRIMARY KEY (`id`)
);
~~~



##### 3、将文件夹gbook解压至../xampp/htdocs里面

##### 4、浏览器输入localhost/gbook/login.html

##### 5、注册账号后登陆即可使用

PS：（4、5必须在apache打开时才能进行，2必须在mysql打开时才能进行）
