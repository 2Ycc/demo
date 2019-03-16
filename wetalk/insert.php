<?php

//接受表单提交数据
$content = $_POST['content'];
$user = $_POST['id'];

//引入外部文件
include('input.php');
include('connect.php');

//实例化对象
$input = new input();

//调用函数，判断内容是否为空
$is = $input->check( $content );
if( $is == false ){
        echo "<script>alert('留言内容不能为空！');location.href='wetalk.php';</script>";
        exit();
}

//调用时间函数
$time = time();

//执行SQL插入语句
$sql = "INSERT INTO msg (content, user, intime)
        VALUES ('{$content}', '{$user}', '{$time}')";
$db->query($sql);

// 内容插入数据库后跳转至留言板，可见留言内容
header('location: wetalk.php');

?>