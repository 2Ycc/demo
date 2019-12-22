<?php

// 开始会话控制
session_start();
$username = $_SESSION['username'];

//防止用户绕过登录   
if(empty($_SESSION["username"]))
{
    header("location:../login.html");
    exit;
}

// 引入外部文件（数据库连接）、（用户名及密码检查）
include('connect.php');


$sql = "SELECT * FROM msg ORDER BY id DESC";
$mysqli_result = $db->query($sql);
if( $mysqli_result ===false ){
    echo "SQL错误";
    exit;
}

?> 

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>gbook</title>
<link rel="stylesheet" href="../css/wetalk.css">
<link rel="stylesheet" href="https://unpkg.com/purecss@1.0.0/build/pure.css" crossorigin="anonymous">


</head>

<body>
    <div class="head">
        用户名:<?php echo $username;?>
        <a href="../user/logout.php">退出登陆</a>
    </div>
    <h2 id="h2">留言板</h2>
    <div class="container">
        <!-- 发表留言 -->
        <div class="add">
        <form action="insert.php" method="POST">
            <textarea name="content" class="content" placeholder="有什么想和大家分享的？" cols="50" rows="5"></textarea>
            <input type="hidden" name="id" value="<?php echo $username;?>"/>


            <button type="submit" class="pure-button pure-button-primary">Submit</button>
            <!-- <input class="btn" type="submit" value="发表留言"/> -->
        </form>
        </div>

        <?php
        // 通过while循环输出$row中的内容 关联数组
        while($row=$mysqli_result->fetch_array( MYSQLI_ASSOC )){
        ?>
        <!-- 查看留言 -->
        <div>
            <div class="msg">
                <div class="info">
                    <span class="user"><?php echo $row['user'];?></span>
                    <span class="time"><?php  $row['intime']+=25200; echo date("Y-m-d H:i:s",$row['intime']);?></span>
                </div>    
                <div class="content">
                    <?php echo $row['content'];?>
                    <a href="edit.php?id=<?php echo $row['id'];?>">编辑</a>
                    <a href="">&nbsp;&nbsp;</a>
                    <?php //var_dump($row['id']); ?>
                    <a href="delete.php?id=<?php echo $row['id'];?>">删除</a>
                </div>
            </div>
        </div>
        <?php
        }
        ?>
    </div>
</body>
</html>
