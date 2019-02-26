<?php

	class Core_Download extends Overrider
	{

		function base_dlheader($type)
	        {
	                 header("Content-type: application/$type");
	        }
	
	        function base_createdl($path)
	        {
	                return $path;
	        }
	
	        function base_getdl($path)
	        {
	                return $path;
			}
	}


?>
