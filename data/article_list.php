<?php

include 'conn.php';


//操作$opt==‘1’时删除
$opt=$_POST['opt'];

//初始加载数据
if($opt==''){
    /*$sql="select * from posts ORDER BY post_time DESC";*/
    $result = mysqli_query($conn, "select * from posts ORDER BY post_update_time DESC");
    if (!$result) {
        printf("Error: %s\n", mysqli_error($conn));
        exit();
    }
    while ($row = mysqli_fetch_array($result)) {
        $post = array('id' => $row["ID"], 'post_author' => $row["post_author"], 'post_update_time' => $row["post_update_time"], 'post_title' => $row["post_title"], 'post_content' => $row["post_content"], 'post_status' => $row["post_status"], 'post_user' => $row["post_user"], 'post_type' => $row["post_type"]);
        $data[] = $post;
    }

    $json = json_encode($data,JSON_UNESCAPED_UNICODE);
    echo "{" . '"post"' . ":" . $json . "}";
}

//删除选中数据 $opt='1'
if($opt=='1'){

    $DeleteNum=$_POST['num'];

    if($DeleteNum>0){
        for($i=0;$i<$DeleteNum;$i++){
            $dataObj='data_'.$i;

            $post_title=$_POST[$dataObj]['post_title'];
            $ID=$_POST[$dataObj]['post_ID'];
            $postType=$_POST[$dataObj]['post_type'];
            $postUpdateTime=$_POST[$dataObj]['post_update_time'];

            $deletSql="delete from posts where post_title='{$post_title}' and ID='{$ID}'";
            $deletResult=mysqli_query($conn,$deletSql);
        }
    }else{

        $post_title=$_POST['post_title'];
        $ID=$_POST['post_ID'];
        $postType=$_POST['post_type'];
        $postUpdateTime=$_POST['post_update_time'];

        $deletSql="delete from posts where post_title='{$post_title}' and ID='{$ID}'";
        $deletResult=mysqli_query($conn,$deletSql);
    }


    if($deletResult){
        echo '删除成功';
    }else{
        echo '删除失败';
    }
}





mysqli_close($conn);
?>