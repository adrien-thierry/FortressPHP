<?php
	if(!defined("FORTRESSPHP")) header('Location: ../');
	$la = $GLOBALS['langage'];
	addDiv("menu");
		addDiv("tab");
			addMenu($la[42], "?p=".HOME_PAGE);
			addMenu("EXAMPLE", "?p=app");
			addMenu("Blog", "?p=blog");
		endDiv();
	endDiv();
?>