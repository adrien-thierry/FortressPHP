<?php
	class menu_mod
	{
		public function code()
		{
			WF::Html()->div("menu");
				WF::Html()->div("tab");
					WF::Html()->a("Home", "?p=".HOME_PAGE);
				WF::Html()->enddiv();
			WF::Html()->enddiv();
		}
	}
?>
