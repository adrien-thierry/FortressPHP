<?php
	if(!defined("FORTRESSPHP")) header('Location: ../');
	$la = $GLOBALS['langage'];
	addDiv("contact", "class='pad'");
			addSpan($la[8], "class='title'");
			br();br();
			addCrypt("<a href='mailto:email@your-domain.com'>email@yourdomain.com</a>");
	endDiv();
	addLine();
?>