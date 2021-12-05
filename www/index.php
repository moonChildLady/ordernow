<?
include "include/config.php";
$CurrentTime =  date('Y-m-d H:i:s');
  $query = "select Id, EventName, EventDate, EventAddress, EnrollDate, EnrollEndDate, cost from EVENTS where '$CurrentTime' between EnrollDate and EnrollEndDate";
  $query_get_info = mysql_query($query);
  $row_info = mysql_fetch_array($query_get_info);
?>
<html>
<head>
	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.3.2/jquery.mobile-1.3.2.min.css" />
<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>

<script src="http://code.jquery.com/mobile/1.3.2/jquery.mobile-1.3.2.min.js"></script>
<script src="jquery.maskedinput.min.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
  $("#enroll").validate();
   $("#userid").mask("999,999,999", {placeholder:" "});
});
</script>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style type="text/css">
.ui-header .ui-title {
    margin-right: 10%;
    margin-left: 10%;
}
.warn{
	 margin-bottom:20px;
	 font-size:8px;
}
</style>
</head>
<body>
	<div data-role="page" id="page1">
    <div data-theme="a" data-role="header" data-position="fixed">
        <h3>
            香港 Puzzle & Dragons <br>パズル＆ドラゴンズ<br> 比賽登記
        </h3>
    </div>
    <div data-role="content">
    	<!--h4>
    		香港 Puzzle & Dragons (パズル＆ドラゴンズ) 的比賽將會在2013年8月20日在旺角舉行。
    	</h4-->
    	<h4>
    		香港 Puzzle & Dragons 聯宜會歡迎大家一起交流攻略心得，彼此成為p ＆ d 的攻略好友。
    	</h4>
    	<h4>
    		現在我們將會舉辦一個 Puzzle & Dragons 的比賽，令各路好友能夠比拼一番，嬴取獎品。
    	</h4>
    	<div data-role="collapsible" data-collapsed="false" data-theme="a" data-content-theme="a" data-collapsed-icon="arrow-r" data-expanded-icon="arrow-d">
   <h3>比賽基本資料</h3>
   
   <div data-role="collapsible" data-collapsed="false" data-theme="b" data-content-theme="b" data-mini="true" data-collapsed-icon="arrow-r" data-expanded-icon="arrow-d">
   <h3>日期及時間</h3>
   <p><?=date('Y-m-d H:i', strtotime($row_info[2]))?></p>
</div>
<div data-role="collapsible" data-collapsed="false" data-theme="b" data-content-theme="b" data-mini="true" data-collapsed-icon="arrow-r" data-expanded-icon="arrow-d">
   <h3>地點</h3>
   <p><?=$row_info[3]?></p>
</div>
<div data-role="collapsible" data-collapsed="false" data-theme="b" data-content-theme="b" data-mini="true" data-collapsed-icon="arrow-r" data-expanded-icon="arrow-d">
   <h3>費用</h3>
   <p>每人 HK$ <?=$row_info[6]?></p>
</div>

</div>
<div data-role="collapsible" data-collapsed="false" data-theme="a" data-content-theme="a" data-collapsed-icon="arrow-r" data-expanded-icon="arrow-d">
   <h3>比賽規則</h3>
   
   <div data-role="collapsible" data-collapsed="false" data-theme="b" data-content-theme="b" data-mini="true" data-collapsed-icon="arrow-r" data-expanded-icon="arrow-d">
   <h3>賽制</h3>
   <p>個人賽</p>
</div>
<div data-role="collapsible" data-collapsed="false" data-theme="b" data-content-theme="b" data-mini="true" data-collapsed-icon="arrow-r" data-expanded-icon="arrow-d">
   <h3>初賽</h3>
   <p>以4人為一組，只要在比賽中，以最短時間完成關卡，就是勝方，晉升準決賽。</p>
</div>
<div data-role="collapsible" data-collapsed="false" data-theme="b" data-content-theme="b" data-mini="true" data-collapsed-icon="arrow-r" data-expanded-icon="arrow-d">
   <h3>準決賽</h3>
   <p>在初賽勝出的朋友，可以參加準決賽，準決賽是2人一組，以最短時間完成關卡，就是勝方。</p>
   	<p>在準決賽中，直至產生4名勝出者，將會獲得決賽資格。</p>
</div>
<div data-role="collapsible" data-collapsed="false" data-theme="b" data-content-theme="b" data-mini="true" data-collapsed-icon="arrow-r" data-expanded-icon="arrow-d">
   <h3>決賽</h3>
   <p>4名獲得決賽資格的朋友，以最短時間完成關卡，就是勝方。</p>
   	<p>第一名為冠軍，第二名為亞軍，第三名為季軍。</p>
</div>
<div data-role="collapsible" data-collapsed="false" data-theme="b" data-content-theme="b" data-mini="true" data-collapsed-icon="arrow-r" data-expanded-icon="arrow-d">
   <h3>獎品</h3>
   <p>在初賽勝出的朋友可得到 日本 iTunes gift card 500円 或同等面額的遊戲點數卡。</p>
   	<p>在決賽勝出的朋友可得到 
   	<ul>
   		<li>冠軍 ： 日本 iTunes gift card 5000円 或同等面額的遊戲點數卡。</li>
   		<li>亞軍 ： 日本 iTunes gift card 3000円 或同等面額的遊戲點數卡。</li>
   		<li>季軍 ： 日本 iTunes gift card 1000円 或同等面額的遊戲點數卡。</li>
   		
   	</ul>
   	</p>
</div>
</div>
<div data-role="collapsible" data-collapsed="false" data-theme="a" data-content-theme="a" data-collapsed-icon="arrow-r" data-expanded-icon="arrow-d">
   <h3>報名方法</h3>
   <p>填妥以下表格，系統會以電郵確認你的身份。</p>
   <form id="enroll" action="save.php" method="POST" data-ajax="false">
   	<div data-role="fieldcontain" class="ui-hide-label">
	<input type="text" name="userid" id="userid" class="required" placeholder="Puzzle & Dragons ID"/>
	<div class="warn"><i>*請填寫 Puzzle & Dragons ID，為9位數字，如：123,456,789 (當中 ',' 系統會自動產生)</i></div>
	<input type="text" name="email" id="email" class="required email" placeholder="電郵"/>
	<div class="warn"><i>*請填寫有效的電郵，系統將會發送一個確認電郵。</i></div>
	<fieldset data-role="controlgroup" style="margin-bottom:20px">
	<legend>Choose a pet:</legend>
     	<input type="radio" name="gender" class="required" id="radio-choice-1" value="m" />
     	<label for="radio-choice-1">男</label>

     	<input type="radio" name="gender"  class="required" id="radio-choice-2" value="f"  />
     	<label for="radio-choice-2">女</label>
</fieldset>
	 <fieldset data-role="controlgroup" style="margin-bottom:20px">
	   <legend>Agree to the terms:</legend>
	   <input type="checkbox" name="agree" id="checkbox-agree" class="required" class="custom" value="agree"/>
	   <label for="checkbox-agree">我同意大會的所有決定，並遵守大會的規則。</label>
    </fieldset>
    <input type="submit" value="確定及送出">
</div>
   </form> 

</div>
    </div>
    <div data-theme="a" data-role="footer" data-position="fixed">
        <h3>
            電郵： <a href="mailto:pad@ez-creation.com">pad@ez-creation.com</a>
        </h3>
    </div>
</div>
</boby>
</html>