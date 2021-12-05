<?php
include "include/config_food.php";
if($_SERVER['REQUEST_METHOD'] == "POST") {
//$getplatform = $browser->getUserAgent();
$enable = $_POST['enable'];
$OrderNo = $_POST['OrderNo'];
/*foreach ($foods as $key => $food){
if($food[$key] != 0){
$sql = "insert into tbl_ORDER(FoodID, NumberOfSet, TableNo) values ('".$food[$key]."', '".$number[$key]."', '2');";
mysql_query($sql) or die('Could not connect: ' . mysql_error());
}
}*/

$sql = "update tbl_TABLESTATUS set Status = '$enable' where orderNo = '$OrderNo';";
if(mysql_query($sql)){
	echo '1';
}else{
	echo '0';
}
//usleep(500000);
}
?>