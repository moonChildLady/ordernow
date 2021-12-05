<?php
include "include/config_food.php";
if($_SERVER['REQUEST_METHOD'] == "POST") {
header("Content-type: text/html; charset=utf-8"); 
header('Access-Control-Allow-Origin: *');
		$uuid = $_POST['uuid'];
		$devic_type= $_POST['device_type'];
		if($isLegal){
		$check_sql = "select count(*) from tbl_DEVICE where uuid = '$uuid'";
		$count_check_sql = mysql_fetch_array(mysql_query($check_sql));
		if($isLegal){
			if($count_check_sql[0] == 0){
				//echo "2"; //never reg this device

				$insert_device = "insert into tbl_DEVICE(uuid, Addon) values('$uuid', '$dateYmdHis');";
				mysql_query($insert_device);
				$insert_id = mysql_insert_id();
				if($devic_type == 1){
					$tableNo = $_POST['tableno'];
					$insert_table = "insert into tbl_TABLE(DeviceID, TableNo) values('$insert_id', '$tableNo');";
					mysql_query($insert_table);
				}
				echo "1";
				
			}else{
				echo "2";
			}
		}
	}else{
		echo "3";
	}
}
?>