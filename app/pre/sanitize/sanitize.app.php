<?php

	class sanitize_app
	{
		function code()
		{
			// CLEAN $_GET
			foreach($_GET as $k => $v )
			{	
				$_GET[$k] = cleanRequest($_GET[$k]);
			}
		}
	}
?>
