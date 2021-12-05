<?
    $dbhost = '127.0.0.1';
    $dbuser = 'root';
    $dbpass = '23602312';
    $dbname = 'pad';
    $con = mysql_connect($dbhost,$dbuser,$dbpass); 
	if (!$con)
   {
   die('Could not connect: ' . mysql_error());
   }
    mysql_query("SET NAMES 'utf8'");
    mysql_select_db($dbname);
    setlocale(LC_MONETARY, 'zh_HK');
?>