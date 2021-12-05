<!DOCTYPE html>
<?php


include "include/config_food.php";
	$uuid=$_GET['uuid'];
	//if(isset($uuid)){
	$sql_match = "select b.uuid, a.TableNo, a.id from tbl_TABLE a left outer join tbl_DEVICE b on b.id = a.DeviceID where b.uuid = '$uuid' and b.Enable = 1";
	$table_match = mysql_fetch_array(mysql_query($sql_match));
	$sql_type=mysql_query("select id, ChiName, LastOrder, EndOrder, Full, Half from tbl_TYPE where enable = 1 and now() between StartTime and EndTime");
	/*if($table_match[0] == NULL){
		header('Location: createdevice.php?uuid='.$uuid);
		die();
	}*/

?>
<?php //include 'include.php'; ?>
<html>
<head>
<link rel="stylesheet" href="css/bootstrap.min.css" />
<link rel="stylesheet" href="css/jquery.mobile-1.4.1.min.css" />

<script src="js/jquery.js"></script>
<script src="js/jquery.mobile-1.4.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="http://pad.dress4u.hk:3000/socket.io/socket.io.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<div data-role="page" id="page1">
    <div data-theme="a" data-role="header" data-position="fixed">
        <h3>
            餐廳後台
        </h3>
    </div>
    <div data-role="content">
	<p><?php echo $table_match[0]; ?></p>
	<form method="POST" id="opentable">
		<input type="text" name="tableid" value="<?php echo $table_match[1]; ?>" placeholder="台號" readonly>
		<input type="hidden" name="uuid" value="<?php echo $_GET['uuid'] ?>">
		<input type="tel" name="orderNo" value="<?php echo time();?>" >
		<input type="tel" name="NumberOfSeat" value="" placeholder="人數">
		<select name="seat_type" id="seat_type">
			<?php while($row = mysql_fetch_array($sql_type)) { ?>
				<option value="<?php echo $row[0]; ?>" data-last="<?php echo $row[2]; ?>" data-end="<?php echo $row[3]; ?>"><?php echo $row[1]." 成：".$row[4]." 半：".$row[5]; ?></option>
			<?php } ?>
		</select>
		<p>最後下單時間：<span id="show_last"></span></p>
		<p>結束時間：<span id="show_end"></span></p>
		
		<input type="hidden"  name="LastOrder" id="LastOrder" value="">
		<input type="hidden"  name= "EndOrder" id="EndOrder" value="">
		<button class="btn btn-primary btn-lg" id="submit">Submit</button>
	</form>
	</div>
</body>
<script>
$(function() {
var socket = io.connect('http://pad.dress4u.hk:3000');
$("#submit").click(function(){
$.ajax({
                url: 'opentable_progess.php',
                data: $('#opentable').serialize(),
                type:"POST",
                //dataType:'text',

                success: function(data){
                    socket.emit('check', {uuid: data,pr:1});
                    socket.emit('get table info');
                    console.log(data);
                },

                 error:function(xhr, ajaxOptions, thrownError){
                    alert(xhr.status);
                    alert(thrownError);
                 }
            });

});
$(document).on('change', '#seat_type', function(){  
			var Last = $("#seat_type option:selected").attr('data-last');
			var End = $("#seat_type option:selected").attr('data-end');
			if(End == '0'){
				//Last = "無限時"；
				End = "無限時";
			}
			if(Last == '0'){
				Last = "無限時";
				//End = "無限時"；
			}
			$("#LastOrder").val(Last);
			$("#EndOrder").val(End);
			$("#show_last").text(Last);
			$("#show_end").text(End);
			//alert(Last);
			
		
		});
$('#seat_type').trigger('change');
});
</script>
</html>