<?php
include "include/config_food.php";
if($_SERVER['REQUEST_METHOD'] == "POST") {
//$getplatform = $browser->getUserAgent();
$foods = $_POST['foodID'];
$number = $_POST['foodquan'];
$TableNo = $_POST['TableNo'];
$OrderNo = $_POST['OrderNo'];
/*foreach ($foods as $key => $food){
if($food[$key] != 0){
$sql = "insert into tbl_ORDER(FoodID, NumberOfSet, TableNo) values ('".$food[$key]."', '".$number[$key]."', '2');";
mysql_query($sql) or die('Could not connect: ' . mysql_error());
}
}*/
$sql = "insert into tbl_ORDER(FoodID, NumberOfSet, TableNo, OrderNo) values ('$foods', '$number', '$TableNo', '$OrderNo');";
if(mysql_query($sql)){
	echo '1';
}
//usleep(500000);
}
?>