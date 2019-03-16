<?php

// 开始会话控制
session_start();

//接收表单数据
$username = $_POST['username'];
$pwd = $_POST['pwd'];

// 引入外部文件（数据库连接）、（用户名及密码检查）
include('../wetalk/input.php');
include('../wetalk/connect.php');

// 实例化对象
$input = new input();

// 调用方法检测账号密码是否为空
$state = $input->check($username);
if( $state == false ){
    // exit("用户名不能为空");
    echo "<script>alert('用户名不能为空！');location.href='../login.html';</script>";
    exit();
}

// echo "<script>alert('此留言不是您所发，无法删除！');location.href='wetalk.php';</script>";
//     exit();

$state = $input->check($pwd);
if( $state == false ){
    // exit("密码不能为空");
    echo "<script>alert('密码不能为空！');location.href='../login.html';</script>";
    exit();
}

// 通过session存储用户名
$_SESSION['username'] = $username;

// 对密码进行加密
$pwd = md5($pwd);

// 执行SQL语句，并判断影响行数
$sql = "SELECT * FROM users where username ='{$username}' AND password ='{$pwd}';";
$data = $db->query( $sql );
$result=$db->affected_rows;

// 通过影响的行数来判断是否登陆成功
if( $result!=0 ){
    // 登陆成功则跳转到留言板
    header("location: ../wetalk/wetalk.php");
}
else{
    echo "<script>alert('用户名或密码错误！');location.href='../login.html';</script>";
    exit();
    // exit("用户名或密码错误");
}


?>