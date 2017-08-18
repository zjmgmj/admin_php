<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/16
 * Time: 8:30
 */
include "conn.php";

$sql="select * from columns ORDER BY columnId ASC";
$res=mysqli_query($conn,$sql);
while($row=mysqli_fetch_array($res)){
    $data[]=array('id'=>$row['columnId'],'categoryName'=>$row['categoryName']);
}

$json=json_encode($data);
echo "{".'"column"'.":".$json."}";

mysqli_close($conn);
?>