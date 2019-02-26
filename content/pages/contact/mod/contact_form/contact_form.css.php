<?php
	class contact_form_css
	{
		public function code()
		{
			addTag("#contact_form");
				//addStyle("background-image: url(\"content/pages/contact/mod/contact_form/images/fond.png\")");
				addStyle("width: 800px");
				addStyle("margin: auto");
				addStyle("margin-top: 5px");
				addStyle("padding-bottom: 20px");
				//addStyle("font-family: Verdana");
				addStyle("font-size: 20px");
			endTag();
			addTag("#back");
				addStyle("padding-top:100px");
				addStyle("padding-bottom:100px");
			endTag();
		}
	}
?>