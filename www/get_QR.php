<?php
	include "phpqrcode/qrlib.php";
	$uuid = $_GET['uuid'];
	
	ob_start("callback");
    
    // here DB request or some processing
    $codeText = 'http://pad.dress4u.hk/opentable.php?uuid='.$uuid;
    
    // end of processing here
    $debugLog = ob_get_contents();
    ob_end_clean();
    
    // outputs image directly into browser, as PNG stream
    QRcode::png($codeText);
?>