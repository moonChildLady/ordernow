<?php
include "include/config_food.php";
header("Content-type: text/html; charset=utf-8"); 
// ** means don't change it
//$curday = date("Y-m-d");//format 2012-09-10 **;
//$start_day = "2012-10-01";//start date, format 2012-09-10;
//$end_date = "2012-10-20";//end date, format 2012-09-10;


//sql
//$SID = "s9991234";

//$num_rows = mysql_fetch_row($check); //check student is done it before or not
$check = "select count(*), b.ChiName, b.EnglishName, images from tbl_RATE a left outer join tbl_FOOD b on b.id = a.Food_id group by a.Food_id";
$result = mysql_query($check);
$data = array(); 
//header('Content-Type: application/json; charset=utf-8'); 
while ( $row = mysql_fetch_assoc($result) ) 
{ 
    $data[] = $row; 
}

echo urldecode(json_encode( $data )); 
//usleep(700000);
mysql_close();
?>