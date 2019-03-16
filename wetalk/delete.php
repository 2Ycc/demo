<?php

session_start();
$username = $_SESSION['username'];
$id = $_GET['id'];
// var_dump($id);

include('../wetalk/connect.php');

$sqlSelect = "SELECT user FROM msg WHERE id={$id}";
$mysqli_result = $db->query($sqlSelect);
$row[] = $mysqli_result->fetch_array( MYSQLI_ASSOC );

// var_dump($row['0']['user']);
// var_dump($username);
if($row['0']['user']!=$username){
    echo "<script>alert('此留言不是您所发，无法删除！');location.href='wetalk.php';</script>";
    exit();
}else{
    $sql="DELETE FROM msg where id={$id};";
    $db->query($sql);
    echo "<script>alert('删除成功！');location.href='wetalk.php';</script>";
    exit();
}


?> 