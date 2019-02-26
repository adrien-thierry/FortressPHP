<?php
	class image_app
	{
		public function override()
		{
			Tools::OverrideClass("Img", "Secured_Img");		
		}

		public function code()
		{
			if(isset($_GET[IMG_GET]))
			{
				WF::TPL()->inner .= WF::Img()->getimg($_GET[IMG_GET]);
				WF::TPL()->show();
				die();
			}
		}
	}
?>
