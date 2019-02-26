<?php
	if(!defined("FORTRESSPHP")) header('Location: ../');
	function createPaypalButton($form, $title, $arr, $key)
	{	
		echo @"<div style='display:none'><form id='$form' method='post' action='https://www.paypal.com/cgi-bin/webscr'><input type='hidden' name='cmd' value='_s-xclick'><input type='hidden' name='hosted_button_id' value='$key'></form></div>";
   		$cnt = "<div class='bp' onClick='Javascript:$form.submit();'>";
		$cnt .= "<div class='top'>";
		$cnt .= "<h2>$title</h2>";
		foreach($arr as $str) $cnt .= "<h3>".$str."</h3>";
		$cnt .= "</div>";
		$cnt .= "</div>";
		echo $cnt;
	}
?>