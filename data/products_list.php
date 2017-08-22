<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/21
 * Time: 15:03
 */

include "conn.php";

//操作$opt==‘1’时删除
$opt=$_POST['opt'];

//初始加载数据
if($opt==''){
    $sql="select * from products ORDER BY product_update_time DESC";
    $result=mysqli_query($conn,$sql);

    if (!$result) {
        printf("Error: %s\n", mysqli_error($conn));
        exit();
    }

    while ($row = mysqli_fetch_array($result)) {
        $post = array('id' => $row["id"], 'product_title' => $row["product_title"], 'product_content' => $row["product_content"], 'product_pic' => $row["product_pic"], 'product_sort' => $row["product_sort"], 'product_post_time' => $row["product_post_time"], 'product_update_time' => $row["product_update_time"], 'product_category' => $row["product_category"],'product_status'=>$row["product_status"],
            'product_price'=>$row['product_price'],'product_market_price'=>$row['product_market_price'],'product_cost_price'=>$row['product_cost_price'],'product_num'=>$row['product_num'],'product_specification'=>$row['product_specification'],
            'product_origin'=>$row['product_origin'],'product_material'=>$row['product_material'],'product_supplier'=>$row['product_supplier'],'product_unit'=>$row['product_unit'],'product_weight'=>$row['product_weight'],'products_key'=>$row['products_key'],'product_summary'=>$row['product_summary']);
        $data[] = $post;
    }

    $json = json_encode($data,JSON_UNESCAPED_UNICODE);
    echo "{" . '"products"' . ":" . $json . "}";
}

if($opt=='1'){
    $DeleteNum=$_POST['num'];

    if($DeleteNum>0){
        for($i=0;$i<$DeleteNum;$i++){
            $dataObj='data_'.$i;

            $poroduct_title=$_POST[$dataObj]['poroduct_title'];
            $id=$_POST[$dataObj]['id'];

            $deletSql="delete from products where product_title='{$poroduct_title}' and id='{$id}'";
            $deletResult=mysqli_query($conn,$deletSql);
        }
    }else{

        $poroduct_title=$_POST['poroduct_title'];
        $id=$_POST['id'];

        $deletSql="delete from products where product_title='{$poroduct_title}' and id='{$id}'";
        $deletResult=mysqli_query($conn,$deletSql);
    }


    if($deletResult){
        echo '删除成功';
    }else{
        echo '删除失败';
    }
}

//搜索
if($opt=='2'){
    $timeStart=$_POST['timeStart'];
    $timeEnd=$_POST['timeEnd'];
    $searchTitle=$_POST['searchTitle'];

    $searchSql="select * from products where product_update_time>'{$timeStart}' and product_update_time<'{$timeEnd}' and product_title like '%{$searchTitle}%' order by product_update_time desc ";

    $res = mysqli_query($conn, $searchSql);

    if (!$res) {
        printf("Error: %s\n", mysqli_error($conn));
        exit();
    }

    while ($row = mysqli_fetch_array($res)) {
        $post = array('id' => $row["id"], 'product_title' => $row["product_title"], 'product_content' => $row["product_content"], 'product_pic' => $row["product_pic"], 'product_sort' => $row["product_sort"], 'product_post_time' => $row["product_post_time"], 'product_update_time' => $row["product_update_time"], 'product_category' => $row["product_category"],'product_status'=>$row["product_status"],
            'product_price'=>$row['product_price'],'product_market_price'=>$row['product_market_price'],'product_cost_price'=>$row['product_cost_price'],'product_num'=>$row['product_num'],'product_specification'=>$row['product_specification'],
            'product_origin'=>$row['product_origin'],'product_material'=>$row['product_material'],'product_supplier'=>$row['product_supplier'],'product_unit'=>$row['product_unit'],'product_weight'=>$row['product_weight'],'products_key'=>$row['products_key'],'product_summary'=>$row['product_summary']);
        $data[] = $post;
    }

    $json = json_encode($data, JSON_UNESCAPED_UNICODE);
    echo "{" . '"products"' . ":" . $json . "}";
}

?>