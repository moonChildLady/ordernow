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
include "include/config.php";
include "include/Browser.php";
require_once('include/class.phpmailer.php');
$browser = new Browser();
$UserId = $_POST['userid'];
$Email = $_POST['email'];
$Gender = $_POST['gender'];
if($Gender == 'm'){
	$GenderReal = '男';
}else{
	$GenderReal = '女';
}
$Agree = $_POST['agree'];
$EventID = 1;
$today = date('Y-m-d');
$EventCode = md5($UserId.$Email.time().rand());
$EmailReply = 1;

function GetIP(){
 if(!empty($_SERVER["HTTP_CLIENT_IP"])){
  $cip = $_SERVER["HTTP_CLIENT_IP"];
 }
 elseif(!empty($_SERVER["HTTP_X_FORWARDED_FOR"])){
  $cip = $_SERVER["HTTP_X_FORWARDED_FOR"];
 }
 elseif(!empty($_SERVER["REMOTE_ADDR"])){
  $cip = $_SERVER["REMOTE_ADDR"];
 }
 else{
  $cip = "not found!";
 }
 return $cip;
}
$IPAddress = GetIP();
$check_userid = "select Id, UserId from COMPETITION where Email = '$Email' and EventID = $EventID";
$insert_query = "insert into COMPETITION(UserID, Email, Gender, Agree, EventID, EventCode, EmailReply, IPAddress, Device) values ('$UserId', '$Email', '$Gender', '$Agree', '$EventID', '$EventCode', '$EmailReply', '$IPAddress', '$browser');";
if($UserId){
  $count = mysql_num_rows(mysql_query($check_userid));
  if($count >= '1')
  {
    //echo $EventCode;
    ?>
      <h4>你的電郵已被登記。如不是你本人登記，請即時與我們聯絡。</h4>


    <?
  }else{
	mysql_query($insert_query) or die ('Could not connect: ' . mysql_error());
	mysql_close();
	$mail = new PHPMailer(true); // the true param means it will throw exceptions on errors, which we need to catch

$mail->IsSMTP(); // telling the class to use SMTP

try {
  $mail->Host       = "ez-creation.com"; // SMTP server
  $mail->SMTPDebug  = 2;                     // enables SMTP debug information (for testing)
  $mail->SMTPAuth   = true;                  // enable SMTP authentication
  $mail->SMTPSecure = "tls";
  $mail->Host       = "ez-creation.com"; // sets the SMTP server
  $mail->Port       = 587;                    // set the SMTP port for the GMAIL server
  $mail->Username   = "it@ez-creation.com"; // SMTP account username
  $mail->Password   = "62452312";        // SMTP account password
  $mail->CharSet = 'UTF-8';
  $mail->AddAddress($Email, $UserId);
  $mail->SetFrom('info@ez-creation.com', 'P & D 聯宜會');
  //$mail->AddReplyTo('name@yourdomain.com', 'First Last');
  $mail->Subject = 'P & D 聯宜會 比賽 確認信';
  $mail->AltBody = 'To view the message, please use an HTML compatible email viewer!'; // optional - MsgHTML will create an alternate automatically
  //$mail->MsgHTML(file_get_contents('contents.html'));
  $mail->MsgHTML(
  	'<p>請確認以下資料無誤：</p>
  	<p>你曾'.$today.'在pad.makeupchild.com中填寫以下資料</p>
  	<p>&nbsp;</p>
  	<p>P & D ID: '.$UserId.'</p>
  	<p>電郵: '.$Email.'</p>
  	<p>性別: '.$GenderReal.'</p>
  	<p>如以上資料正確，請按以下連結進行確認，一經確認後，你的比賽資格正式生效</p>
  	<p><a href="http://pad.makeupchild.com/verfi.php?code='.$EventCode.'">按我進行確認</a></p>
  	<p>&nbsp;</p>
  	<p>P & D 聯宜會 敬上</p>
    <p>'.$today.'</p>'
  	);
  //$mail->AddAttachment('images/phpmailer.gif');      // attachment
  //$mail->AddAttachment('images/phpmailer_mini.gif'); // attachment
  //$mail->Send();
  //echo "Message Sent OK</p>\n";
} catch (phpmailerException $e) {
  echo $e->errorMessage(); //Pretty error messages from PHPMailer
} catch (Exception $e) {
  echo $e->getMessage(); //Boring error messages from anything else!
}
?>
	<h4>
    你已成功登記，請檢查你的電郵，並按照電郵的指示進行確認。
  </h4>
  <h4>
    你剛才所提供的電郵是：<?=$Email?>
  </h4>
  <h5>
    若你剛才所提供的電郵有錯誤，請你保留此錯誤的電郵，把該資料電郵給我們。我們馬上會為你更正。
  </h5>
<?
}
}else{
?>
<h4>系統錯誤</h4>
<h4>請與我們聯絡</h4>
<?
}
//echo $UserId;
//echo $EventCode;
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