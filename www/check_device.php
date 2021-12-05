<?php
include "include/config_food.php";
if($_SERVER['REQUEST_METHOD'] == "POST") {
header("Content-type: text/html; charset=utf-8"); 
header('Access-Control-Allow-Origin: *');
		$uuid = $_POST['uuid'];
		if($isLegal){
		$check_sql = "select count(*) from tbl_DEVICE where uuid = '$uuid'";
		$count_check_sql = mysql_fetch_array(mysql_query($check_sql));
			if($count_check_sql[0] == 0){
				echo "2"; //never reg this device
			}else{
				echo "1";
			}
		}
}
?>