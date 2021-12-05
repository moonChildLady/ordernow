<!DOCTYPE html>
<?php
if(isset($_GET['uuid'])){
$uuid = $_GET['uuid'];
}
include "include/config_food.php";
if($_SERVER['REQUEST_METHOD'] == "POST") {
	/*$check_license_sql = "select sum(Number) as 'CAL', (select count(*) from tbl_DEVICE where enable = 1) as 'NumberOfDevice' from tbl_LICENSE";
	$check_license = mysql_fetch_array(mysql_query($check_license_sql));
	$cal = $check_license[0];
	$numberofdevice = $check_license[1];
	if($numberofdevice <= $cal){
	//$tableid = $_POST['tableid'];
		echo "<script>alert('1')</script>";
	}*/
	//echo '1';
}
?>
<html>
<head>
<link rel="stylesheet" href="css/bootstrap.min.css" />
<link rel="stylesheet" href="css/jquery.mobile-1.4.1.min.css" />

<script src="js/jquery.js"></script>
<script src="js/jquery.mobile-1.4.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<div data-role="page" id="page1">
    <div data-theme="a" data-role="header" data-position="fixed">
        <h3>
            餐廳後台-分配台號
        </h3>
    </div>
    <div data-role="content">
	<p><?php echo $uuid; ?></p>
	<form method="POST" action="">
		<input type="tel" name="tableid" placeholder="台號">
		<input type="hidden" name="uuid" value="<?php if(isset($uuid)) { echo $uuid;}  ?>">
		<input type="submit" class="btn btn-primary btn-lg" id="submit" value="Submit">
	</form>
	</div>
</body>
</html>