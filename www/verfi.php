<html>
<head>
  <link rel="stylesheet" href="http://code.jquery.com/mobile/1.3.2/jquery.mobile-1.3.2.min.css" />
<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script src="http://code.jquery.com/mobile/1.3.2/jquery.mobile-1.3.2.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
  <div data-role="page" id="page1">
    <div data-theme="a" data-role="header" data-position="fixed">
        <h3>
            香港 Puzzle & Dragons <br>パズル＆ドラゴンズ<br> 比賽登記
        </h3>
    </div>
    <div data-role="content">
<?
$Action = $_GET['action'];
$Code = $_GET['code'];
include "include/config.php";
	$query = "select Id, UserId, Email, RegDate from COMPETITION where EventCode = '$Code' and EmailReply != 0";
	$query_get_info = mysql_query($query);
	$row_info = mysql_fetch_array($query_get_info);
	$count_info = mysql_num_rows($query_get_info);
	//echo $row_info[2];
	
if($Action != '1' || $Action == null){
if($Code){
	
	//echo $RegDateAdd20Min;
	if($count_info == '1'){
	$CurrentTime =  date('Y-m-d H:i:s');
	$RegDate = strtotime($row_info[3]);
	$RegDateAdd20Min = date('Y-m-d H:i:s', strtotime('+20 minutes', $RegDate));
	if($CurrentTime < $RegDateAdd20Min)
	{
?>
<h4>因你的連結超過了20分鐘還沒有進行確認，</h4>
<h4>請<a href="verfi.php?code=<?=$Code?>&action=1">按此</a>重新進利確認。</h4>
<?
	}else{
		$update_sql = "update COMPETITION SET EmailReply = '0' where EventCode = '$Code'";
		mysql_query($update_sql);
		
?>
<h4>你已成功確認，請按電郵所提供的資料出席，再次多謝你的參與。</h4>
<h4>如你有任何的問題，請隨時電郵我們，我們會馬上回應你的問題，謝謝。</h4>
<?
	}

}else{ 
//already activate
?>
	<h4>你已成功確認，不需要再次確認，或認證錯誤。</h4>
	<h4>如你有任何的問題，請隨時電郵我們，我們會馬上回應你的問題，謝謝。</h4>
<?
}
}else{
//no code
	header('Location: /');
}
}elseif ($Action == '1') {
	$update_sql = "update COMPETITION SET EmailReply = '0' where EventCode = '$Code'";
		mysql_query($update_sql);
?>
<h4>你已重新確認，謝謝。</h4>
<h4>如你有任何的問題，請隨時電郵我們，我們會馬上回應你的問題，謝謝。</h4>
<?
}else{
	?>
<h4>認證錯誤。</h4>
<h4>如你有任何的問題，請隨時電郵我們，我們會馬上回應你的問題，謝謝。</h4>	
<?
}
?>
</div>
<div data-theme="a" data-role="footer" data-position="fixed">
        <h3>
            電郵： <a href="mailto:pad@ez-creation.com">pad@ez-creation.com</a>
        </h3>
    </div>
</div>
</body>
</html>
<? mysql_close(); ?>