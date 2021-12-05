<?php
include "include/config_food.php";
header("Content-type: text/html; charset=utf-8"); 
if($_SERVER['REQUEST_METHOD'] == "POST") {
//$getplatform = $browser->getUserAgent();
$food = $_POST['food'];
$orderNo = $_POST['orderNo'];
$sql = "insert into tbl_RATE(Food_id, orderNo) values ('$food', '$orderNo');";
if(mysql_query($sql)){
	echo '1';
}
}
mysql_close();
?>