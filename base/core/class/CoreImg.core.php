<?php

		class Core_Img extends Overrider
		{

			function base_imgheader($t)
			{
				 header("Content-type: image/$t");
			}

			function base_createimg($p)
			{
				return $p;
			}
	
			function base_getimg($p)
			{
				return file_get_contents($p);
			}
		}
?>
