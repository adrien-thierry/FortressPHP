<?php
	class menu_mod
	{
		public function code()
		{
			$la = $GLOBALS['langage'];
			addDiv("menu");
				addDiv("tab");
					addMenu($la[42], "?p=".HOME_PAGE);
					addMenu("ExAMPLE", "?p=app");
					addMenu("Blog", "?p=blog");
					addMenu("Contact", "?p=contact");
					addMenu($la[30], "?p=download");
				endDiv();
			endDiv();
		}
	}
?>