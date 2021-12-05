<?php
    $dbhost = '127.0.0.1';
    $dbuser = 'root';
    $dbpass = '23602312';
    $dbname = 'BUFFET';
    $con = mysql_connect($dbhost,$dbuser,$dbpass); 
	if (!$con)
   {
   die('Could not connect: ' . mysql_error());
   }
    mysql_query("SET NAMES 'utf8'");
    mysql_select_db($dbname);
    setlocale(LC_MONETARY, 'zh_HK');
    $dateYmdHis = date('Y-m-d H:i:s');
    $check_license_sql = "select sum(Number) as 'CAL', (select count(*) from tbl_DEVICE where enable = 1) as 'NumberOfDevice' from tbl_LICENSE";
  $check_license = mysql_fetch_array(mysql_query($check_license_sql));
  $cal = $check_license[0];
  $numberofdevice = $check_license[1];
  if($numberofdevice < $cal+1){
    $isLegal = true;
  }else{
    $isLegal = false;
  }
?>