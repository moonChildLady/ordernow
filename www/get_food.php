<?php
include "include/config_food.php";
if($_SERVER['REQUEST_METHOD'] == "POST") {
header("Content-type: text/html; charset=utf-8"); 
header('Access-Control-Allow-Origin: *');
// ** means don't change it
//$curday = date("Y-m-d");//format 2012-09-10 **;
//$start_day = "2012-10-01";//start date, format 2012-09-10;
//$end_date = "2012-10-20";//end date, format 2012-09-10;


//sql
//$SID = "s9991234";
$TypeID = $_POST['Type'];
//$get_food_details = $_POST['get_food_details'];
$food_id =$_POST['food_id'];
//$num_rows = mysql_fetch_row($check); //check student is done it before or not
//$check = "select a.id, a.EnglishName as food_engname, a.ChiName as food_chiname, a.Description, a.images, a.Calorie, b.chiname as cat_chiname, b.englishname as cat_english, c.chiname as source_chiname, c.englishname as source_engname, CONCAT('$', FORMAT(d.Price, 2)) as Price, d.Price as 'ShowPrice' from tbl_FOOD a left outer join tbl_CAT b on a.CatID = b.id left outer join tbl_SOURCE c on a.Source = c.id left outer join tbl_PRICE d on d.FoodID = a.id where d.Enable = 1";
if(isset($food_id)){
	$condition = "b.id = '$food_id'";
}else{
	$condition = "";
}
//$check ="select b.id, b.EnglishName as food_engname, b.ChiName as food_chiname, b.Description, b.images, b.Calorie, c.chiname as source_chiname, c.englishname as source_engname, CONCAT('$', FORMAT(d.Price, 2)) as Price, d.Price as 'ShowPrice'  from tbl_FOODCAT a left outer join tbl_FOOD b on a.foodid = b.id left outer join tbl_SOURCE c on b.Source = c.id left outer join tbl_PRICE d on b.id = d.FoodID where d.Enable = 1 and a.CatID in (select CatID from tbl_TYPECAT where typeID = '$TypeID') $condition group by b.id";

$check = "Select b.id, b.EnglishName as food_engname, b.ChiName as food_chiname, b.Description, b.images, b.Calorie, c.chiname as source_chiname, c.englishname as source_engname, CONCAT('$', FORMAT(d.Price, 2)) as Price, d.Price as 'ShowPrice', b.CatID from tbl_FOOD b left outer join tbl_SOURCE c on b.Source = c.id left outer join tbl_PRICE d on b.id = d.FoodID left outer join tbl_TYPECAT e on e.CatID =  b.CatID where $condition";

$result = mysql_query($check);
$data = array(); 
//header('Content-Type: application/json; charset=utf-8'); 
while ( $row = mysql_fetch_assoc($result) ) 
{ 
    $data[] = $row; 
}

echo urldecode(json_encode( $data )); 
usleep(700000);
}
mysql_close();
?>