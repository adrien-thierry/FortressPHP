<?php
	class blog_css
	{
		public function code()
		{
			addTag("#background");
			
			endTag();
			addTag("#page");

			endTag();
			addTag("#blog");
				addStyle("padding-top:20px");
				addStyle("padding-bottom:20px");
			endTag();
		}
	}
?>