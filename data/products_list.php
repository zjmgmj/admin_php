<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/21
 * Time: 15:03
 */

include "conn.php";

$sql="select * from products ORDER BY product_update_time DESC";
$result=mysqli_query($conn,$sql);

if (!$result) {
    printf("Error: %s\n", mysqli_error($conn));
    exit();
}

while ($row = mysqli_fetch_array($result)) {
    $post = array('id' => $row["id"], 'product_title' => $row["product_title"], 'product_content' => $row["product_content"], 'product_pic' => $row["product_pic"], 'sort' => $row["sort"], 'product_post_time' => $row["product_post_time"], 'product_update_time' => $row["product_update_time"], 'product_category' => $row["product_category"],'status'=>$row["status"],
        'product_price'=>$row['product_price'],'market_price'=>$row['market_price'],'cost_price'=>$row['cost_price'],'product_num'=>$row['product_num'],'specification'=>$row['specification'],
        'origin'=>$row['origin'],'material'=>$row['material'],'supplier'=>$row['supplier'],'unit'=>$row['unit'],'weight'=>$row['weight'],'products_key'=>$row['products_key'],'summary'=>$row['summary']);
    $data[] = $post;
}

$json = json_encode($data,JSON_UNESCAPED_UNICODE);
echo "{" . '"products"' . ":" . $json . "}";
?>