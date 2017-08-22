<?php


/*本地连接*/
$dbhost = "localhost";
$username = "root";
$userpass = "888888";
$dbdatabase = "admin";

//远程连接
/*$dbhost = "148.66.136.137";
$username = "zhjm";
$userpass = "ZHJM520gmj620";
$dbdatabase = "admin_php";*/
//链接数据库
$conn = mysqli_connect($dbhost, $username, $userpass, $dbdatabase);
if (mysqli_connect_error()) {
	echo '失败';
	exit();
}
?>