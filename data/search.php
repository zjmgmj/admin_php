<?php
include 'conn.php';

/*条件搜索*/
$type = $_POST['type'];

$timeStart = $_POST['timeStart'];
$timeEnd = $_POST['timeEnd'];

$searchTitle = $_POST['searchTitle'];

$timeSearchSql = "select * from posts where post_update_time>'{$timeStart}' and  post_update_time<'{$timeEnd}' and post_title like '%{$searchTitle}%' order by post_update_time desc ";

$res = mysqli_query($conn, $timeSearchSql);

if (!$res) {
	printf("Error: %s\n", mysqli_error($conn));
	exit();
}

while ($row = mysqli_fetch_array($res)) {
	$post = array('id' => $row["ID"], 'post_author' => $row["post_author"], 'post_time' => $row["post_time"], 'post_title' => $row["post_title"], 'post_content' => $row["post_content"], 'post_status' => $row["post_status"], 'post_user' => $row["post_user"], 'post_type' => $row["post_type"]);
	$data[] = $post;
}

$json = json_encode($data, JSON_UNESCAPED_UNICODE);
echo "{" . '"post"' . ":" . $json . "}";

mysqli_close($conn);
?>