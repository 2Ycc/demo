<?php

//接受表单提交数据
$content = $_POST['content'];
// var_dump($content);
$id = $_POST['id'];
// var_dump($id);
//引入外部文件
include('input.php');
include('connect.php');

//实例化对象
$input = new input();

//调用函数，判断内容是否为空
$is = $input->check( $content );
if( $is == false ){
//     die("留言内容不能为空");
echo "<script>alert('留言内容不能为空！');location.href='wetalk.php';</script>";
exit();
}

//执行SQL插入语句
$sql = "UPDATE msg SET content='{$content}' WHERE id='{$id}'";
$db->query($sql);

// 内容插入数据库后跳转至留言板，可见留言内容
header('location: wetalk.php');

?>