<?php
include "include/config_food.php";
if($_SERVER['REQUEST_METHOD'] == "POST") {
//$getplatform = $browser->getUserAgent();
$OrderNo = $_POST['OrderNo'];
$InvoiceAmount = $_POST['InvoiceAmount'];
$ActualAmount = $InvoiceAmount;
$Remark = $_POST['Remark'];
$ServiceCharge = '';
$StaffCode = '123';
$CreatedOn = date('Y-m-d H:i:s');
/*foreach ($foods as $key => $food){
if($food[$key] != 0){
$sql = "insert into tbl_ORDER(FoodID, NumberOfSet, TableNo) values ('".$food[$key]."', '".$number[$key]."', '2');";
mysql_query($sql) or die('Could not connect: ' . mysql_error());
}
}*/
$sql = "insert into tbl_INVOICE(OrderNo, InvoiceAmount, Discount, ActualAmount, Remark, ServiceCharge, StaffCode, CreatedOn) values ('$OrderNo', '$InvoiceAmount', '1','$ActualAmount', '$Remark', '$ServiceCharge', '$StaffCode', '$CreatedOn');";
$update_table_status = "update tbl_TABLESTATUS set Status = 0 where OrderNo = '$OrderNo'";
$update_table_status_log = "update tbl_TABLELOG set Status = 0 where OrderNo = '$OrderNo'";
mysql_query($sql) or die (mysql_error());

mysql_query($update_table_status) or die (mysql_error());
mysql_query($update_table_status_log) or die (mysql_error());
//usleep(500000);
}
?>