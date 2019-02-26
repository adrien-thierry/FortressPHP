<?php
	class download_app
	{
		function override()
		{
			Tools::OverrideClass("Download", "Download_Code");		
		}
		function code()
		{
			if(isset($_GET[DL_GET]))
			{
				echo WF::Download()->getdl($_GET[DL_GET]);
				die();
			}
		}
	}
?>
