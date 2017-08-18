<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/16
 * Time: 8:30
 */
include "conn.php";

$opt=$_POST['opt'];

if($opt==''){
 $sql="select categoryName from columns ORDER BY columnId DESC";
    $res=mysqli_query($conn,$sql);

    while ($row=mysqli_fetch_array($res)){
       // $data[] =array('id'=>$row['columnId'],'upperSection'=>$row['upperSection'],'categoryName'=>$row['categoryName'],'alias'=>$row);
        $data[] =$row["categoryName"];
    }

    $json = json_encode($data);
    
    echo "{" . '"categoryName"' . ":" . $json . "}";
}



$idSql=mysqli_query($conn,"select max(columnId) from columns");
$idSqlRow=mysqli_fetch_row($idSql);
$ColumnId=$idSqlRow[0]+1;

$UpperSection=$_POST['UpperSection'];
$CategoryName=$_POST['CategoryName'];
$Alias=$_POST['Alias'];
$list=$_POST['Catalog'];
$ContentType=$_POST['ContentType'];

//插入
if($opt=='2'){
    $sql="INSERT INTO columns (columnId,upperSection,categoryName,alias,list,contentType) 
VALUES ('{$ColumnId}','{$UpperSection}','{$CategoryName}','{$Alias}','{$list}','{$ContentType}')";
    $res=mysqli_multi_query($conn,$sql);

    if($res){
        echo '提交成功';
    }else{
        echo '提交失败';
    }
}

//删除
if($opt=='1'){

}









mysqli_close($conn);
?>