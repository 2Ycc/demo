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
    echo "<script>alert('此留言不是您所发，无法修改！');location.href='wetalk.php';</script>";
    exit();
}

?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>修改</title>
    <style>
        .container{
            width:400px;
            margin:0px auto;
        }
        .container input{
            float:right;
        }
    </style>
</head>
<body>
    <div class="container">
        <form action="update.php" method="POST">
            <textarea name="content" cols="60" rows="5"></textarea><br/>
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="reset" value="重置">
            <input type="submit" value="提交">
        </form>
    </div>
</body>
</html>