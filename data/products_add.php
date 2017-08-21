<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/21
 * Time: 10:09
 */

include "conn.php";

$opt=$_POST['opt'];


$idSql=mysqli_query($conn,'select max(id) from products');
$idSqlRow=mysqli_fetch_row($idSql);
$id=$idSqlRow[0]+1;

$product_title=$_POST['product_title'];
$product_content=$_POST['product_content'];
//$product_pic=$_POST['product_pic'];
$product_post_time=$_POST['product_post_time'];
$product_update_time=$_POST['product_post_time'];
$product_category=$_POST['product_category'];
$status=$_POST['status'];


$product_price=$_POST['product_price'];//售价
$market_price=$_POST['market_price'];//市场价
$cost_price=$_POST['cost_price'];//成本价
$product_num=$_POST['product_num'];//可卖数量
$specification=$_POST['specification'];//产品规格
$origin=$_POST['origin'];//产地
$material=$_POST['material'];//材质
$supplier=$_POST['supplier'];//供应商
$unit=$_POST['unit'];//单位
$weight=$_POST['weight'];//重量
$products_key=$_POST['products_key'];//关键字
$summary=$_POST['summary'];//产品摘要


if($opt=='2') {
    include "img.php";
    $sql = "INSERT INTO products (id,product_title,product_content,product_pic,product_post_time,product_update_time,product_category,status,product_price,market_price,cost_price,product_num,specification,origin,material,supplier,unit,weight,products_key,summary) 
VALUES ('{$id}','{$product_title}','{$product_content}','{$paths}','{$product_post_time}','{$product_update_time}','{$product_category}','{$status}','{$product_price}','{$market_price}','{$cost_price}','{$product_num}','{$specification}','{$origin}','{$material}','{$supplier}','{$unit}','{$weight}','{$products_key}','{$summary}')";
    
    $res = mysqli_multi_query($conn, $sql);
    if ($res) {
        echo '提交成功';
    } else {
        echo '提交失败';
    }

}
mysqli_close($conn);

?>
