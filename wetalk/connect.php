<?php

//预定于数据库连接参数
$server = "localhost";
$dbuser = "root";
$psd = "";
$dbname = "me_message";

//连接数据库，检查是否连接成功
$db = new mysqli( $server, $dbuser, $psd, $dbname);
if( $db->connect_error ){
    die("数据库连接失败" . $db->connect_error );
}

//设定数据库传输编码
$db->query("SET NAMES UTF8");

?>