<?php
include "include/config_food.php";
if($_SERVER['REQUEST_METHOD'] == "POST") {
	$tableNo = $_POST['tableNo'];
$check = "select c.id, c.EnglishName as food_engname, c.ChiName as food_chiname, c.Description, c.images, b.NumberOfSet, CONCAT('$', FORMAT(d.Price, 2)) as Price, CONCAT('$', FORMAT(b.NumberOfSet*d.Price, 2)) as 'subTotal', b.process from tbl_ORDER b left outer join tbl_PRICE d on d.FoodID = b.FoodID and d.Enable = 1 left outer join tbl_FOOD c on c.id = d.FoodID where b.updatetime >= (select max(CreatedOn) from tbl_TABLESTATUS where TableID = '$tableNo') and b.TableNo =  '$tableNo' order by b.updatetime DESC";

$check2 = "select CONCAT('$', FORMAT(sum(b.NumberOfSet*d.Price), 2)) as 'show_total', sum(b.NumberOfSet*d.Price) as total,  CONCAT('$', FORMAT(sum(b.NumberOfSet*d.Price*1.1), 2)) as 'show_actual_total', sum(b.NumberOfSet*d.Price*1.1) as actual_total from tbl_ORDER b left outer join tbl_PRICE d on d.FoodID = b.FoodID and d.Enable = 1 left outer join tbl_FOOD c on c.id = d.FoodID where b.updatetime >= (select max(CreatedOn) from tbl_TABLESTATUS where TableID = '$tableNo') and b.TableNo =  '$tableNo'";

$check3 = "select b.buffet, Full, Half from tbl_TABLELOG a left join tbl_TYPE b on a.type = b.id where a.TableID = '$tableNo'";
$result = mysql_query($check);
$result2 = mysql_query($check2);
$result3 = mysql_query($check3);
$data = array(); 
$data2 = array(); 
$data3 = array(); 
//header('Content-Type: application/json; charset=utf-8'); 
while ( $row = mysql_fetch_assoc($result) ) 
{ 
    $data[] = $row; 
}
while ( $row = mysql_fetch_assoc($result2) ) 
{ 
    $data2[] = $row; 
}
	while ( $row = mysql_fetch_assoc($result3) ) 
{ 
    $data3[] = $row; 
}
header("Content-type: text/html; charset=utf-8"); 
header('Access-Control-Allow-Origin: *');
echo urldecode(json_encode( array("order_list"=>$data, "total"=>$data2, "buffet"=>$data3) )); 
usleep(700000);
}
mysql_close();
?>