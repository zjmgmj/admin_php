<?php

include 'conn.php';

$idSql=mysqli_query($conn,"select max(id) from posts");
$getid=mysqli_fetch_row($idSql);

/*($getid[0]<1||is_numeric($getid[0]))? $id=$getid[0]+1 : $id=1;*/
$id=$getid[0]+1;

$post_author=$_POST['post_author'];
$post_update_time=$post_time=$_POST['post_time'];
$post_title=$_POST['post_title'];
$post_content=$_POST['post_content'];
$post_type=$_POST['post_type'];


$_POST['post_status'] ? $post_status=$_POST['post_status'] : $post_status='' ;
$_POST['post_user'] ? $post_user=$_POST['post_user'] : $post_user='' ;

include "img.php";

$sql="INSERT INTO posts (id,post_author,post_time,post_title,post_content,post_status,post_user,post_type,post_update_time) 
VALUES ('{$id}','{$post_author}','{$post_time}','{$post_title}','{$post_content}','{$post_status}','{$post_user}','{$post_type}','{$post_update_time}')";
//$sql="INSERT INTO USER (id,user,password) VALUES ('1','zhjm','zhjm520');";
/*,titel2,types,content,author,sources,author,sources,comment*/
$result=mysqli_multi_query($conn, $sql);
if(!$result){
	echo "上传失败";
	exit;
}

/*//查询读取
$result = mysqli_query($conn, "SELECT * FROM NEWS");

while ($row = mysqli_fetch_array($result)) {
	
	echo $row["id"].' '.$row["title"];
	echo "<br/>";
}*/
echo "上传成功";
//echo "上传成功";

mysqli_close($conn);
?>