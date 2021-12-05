<?php
include "include/config_food.php";
if($_SERVER['REQUEST_METHOD'] == "POST") {
//$getplatform = $browser->getUserAgent();
$uuid = $_POST['uuid'];
/*foreach ($foods as $key => $food){
if($food[$key] != 0){
$sql = "insert into tbl_ORDER(FoodID, NumberOfSet, TableNo) values ('".$food[$key]."', '".$number[$key]."', '2');";
mysql_query($sql) or die('Could not connect: ' . mysql_error());
}
}*/
$tableID = $_POST['tableid'];
$orderNo = $_POST['orderNo'];
$NumberOfSeat = $_POST['NumberOfSeat'];
$seat_type = $_POST['seat_type'];
$LastOrder = $_POST['LastOrder'];
$EndOrder = $_POST['EndOrder'];
$date = date('Y-m-d H:i:s');
$check_last_table = "select TableID, Status, (select max(id) from tbl_TABLESTATUS where TableID =  '$tableID') as 'last_id' from tbl_TABLESTATUS where TableID = '$tableID' and id in (select max(id) from tbl_TABLESTATUS where TableID =  '$tableID')";

$last_table = mysql_fetch_array(mysql_query($check_last_table));
$last_id = $last_table['1'];
if($last_id  == 1){
	$update = "update tbl_TABLESTATUS set Status= 0 where id = $last_id ";
	mysql_query($update) or die(mysql_error);
	}
$sql = "insert into tbl_TABLESTATUS(TableID, OrderNo, NumberOfSeat, CreatedOn, LastOrder, ExpiredOn, Type) values('$tableID', '$orderNo', '$NumberOfSeat', '$date', '$LastOrder', '$EndOrder', '$seat_type');";
mysql_query($sql);

$sql_check = "select count(*) from tbl_TABLELOG where TableID = $tableID";
$result_table = mysql_fetch_array(mysql_query($sql_check));
if($result_table[0] == 1){
$sql2 = "update tbl_TABLELOG set Status = 1, OrderNo = '$orderNo', NumberOfSeat = $NumberOfSeat, Type = $seat_type, LastOrder = '$LastOrder', ExpiredOn = '$EndOrder' where TableID = $tableID";
}else{
	$sql2 = "insert into tbl_TABLELOG(TableID, OrderNo, NumberOfSeat, LastOrder, ExpiredOn, Type) values('$tableID', '$orderNo', '$NumberOfSeat', '$LastOrder', '$EndOrder', '$seat_type');";
}
//echo $sql2;
if(mysql_query($sql2)){
	echo $uuid;
}else{
	echo '0';
}
//usleep(500000);

}
?>