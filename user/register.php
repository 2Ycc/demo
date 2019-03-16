<?php

// 接收表单提交数据
$username = $_POST['username'];
$pwd = $_POST['pwd'];
$pwd2 = $_POST['pwd2'];

// 引入外部文件（数据库连接）、（用户名及密码检查）
include('../wetalk/connect.php');
include('../wetalk/input.php');

// 实例化对象
$input = new input();

// 调用方法检测账号密码是否为空
$state = $input->check($username);
if( $state == false ){
    echo "<script>alert('用户名不能为空！');location.href='../register.html';</script>";
    exit();
}
$state = $input->check($pwd);
if( $state == false ){
    echo "<script>alert('密码不能为空！');location.href='../register.html';</script>";
    exit();
}
$state = $input->check($pwd2);
if( $state == false ){
    echo "<script>alert('确认密码不能为空！');location.href='../register.html';</script>";
    exit();
}
if( $pwd != $pwd2 ){
    echo "<script>alert('两次密码不相同！');location.href='../register.html';</script>";
    exit();
}

// 执行SQL语句并判断影响行数
$sql = "SELECT * FROM users WHERE username='{$username}';";
$data = $db->query( $sql );
$result=$db->affected_rows;

// 通过影响行数来判断用户名是否已经存在
if( $result >= 1 ){
    echo "<script>alert('用户" . $username . "已存在，请重新注册！');location.href='../register.html';</script>";
    exit();
}

// 对密码进行加密
$pwd = md5($pwd);

// 将账号密码插入数据库并输出执行结果
$sql = "INSERT INTO users(username,password) VALUES ('{$username}','{$pwd}');";
if( $db->query( $sql ) ){
    // echo "用户" . $username . "创建成功";
    echo "<script>alert('用户" . $username . "创建成功！点击确认跳转登陆页面。');location.href='../login.html';</script>";
    exit();
}
else{
    echo "<script>alert('用户" . $username . "创建成功！点击确认跳转登陆页面。');location.href='../register.php';</script>";
    exit();
    // echo "用户" . $username . "创建失败";
}

?>
