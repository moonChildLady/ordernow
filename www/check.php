<?php
include "include/config_food.php";
//if($_SERVER['REQUEST_METHOD'] == "POST") {
header("Content-type: text/html; charset=utf-8"); 
header('Access-Control-Allow-Origin: *');
	//$uuid = $_POST['uuid'];
	$uuid = $_GET['uuid'];
	//$check_table = "select udid, TableNo, NumberOfSeat from tbl_TABLE where udid = '$udid' and now() between CreatedOn and ExpireOn";
	if($isLegal){
	$check_device_sql = "select count(*) from tbl_DEVICE where uuid = '$uuid' and Enable = 1";
	$check_device = mysql_fetch_array(mysql_query($check_device_sql));
	//echo $check_device_sql;
	if($check_device[0] == 1){
		$sql_deviceType = "select deviceType from tbl_DEVICE where uuid = '$uuid'";
		$check_deviceType = mysql_fetch_array(mysql_query($sql_deviceType));
	if($check_deviceType[0]==1){//devicetype = 1 is customer
	$check_table = "select d.uuid, a.TableNo, b.Status, b.OrderNo, b.NumberOfSeat, b.CreatedOn, b.LastOrder, b.ExpiredOn, b.Type, c.ChiName as 'TypeName',d.deviceType from tbl_TABLE a left outer join tbl_TABLESTATUS b on b.TableID = a.TableNo left outer join tbl_TYPE c on c.id = b.Type left outer join tbl_DEVICE d on d.id = a.DeviceID where d.uuid = '$uuid' and b.Status = 1 and b.TableID = (select a.TableNo from tbl_TABLE a left outer join tbl_DEVICE b on b.id = a.DeviceID where b.uuid = '$uuid')";
	$count_check_table = mysql_fetch_array(mysql_query($check_table));
	if($count_check_table[2] == 1){
		//$get_table = "select udid, TableNo, NumberOfSeat, Available from tbl_TABLE where udid = '$udid'";
		$get_order_no = "SELECT count(*) as 'NoOfOrder' FROM tbl_ORDER b left outer join tbl_TABLE a on a.TableNo = b.TableNo where b.updatetime >= (select max(CreatedOn) from tbl_TABLESTATUS) and a.uuid = '$uuid'";
		$result = mysql_query($check_table);
		$result2 = mysql_query($get_order_no);
		$data = array(); 
		$data2 = array(); 
		//header('Content-Type: application/json; charset=utf-8'); 
		while ( $row = mysql_fetch_assoc($result) ) 
		{ 
    		$data[] = $row; 
		}
		while ( $row = mysql_fetch_assoc($result2) ) 
		{ 
    		$data2[] = $row; 
		}
		
		//echo urldecode(json_encode( $data )); 
		echo urldecode(json_encode( array('TableInfo'=>$data, 'Order'=>$data2) )); 
		//echo '1';
		//usleep(700000);

	}else{
		echo "3";//
	}
}else{
	echo "5";
}


	}else{//check uuid in table - yes
		echo "2";
	}//check uuid in table - no

	}else{//check cal and license - yes
		echo "4";
	}//check cal and license - no
/*}else{
	echo '2';
}*/
//mysql_close();
?>