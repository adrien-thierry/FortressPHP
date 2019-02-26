<?php

	class error_app
	{
		function code()
		{
		if(isset($_GET['e']) && strlen(htmlStrip(htmlentities($_GET['e']))) > 0)
		{
			TPL::$name = htmlStrip(htmlentities($_GET['e'])); 
			header("Location: ".MAIN_URL.BASE_SCRIPT."?p=" . TWF::TPL()->name);
		}
	}
}
?>
