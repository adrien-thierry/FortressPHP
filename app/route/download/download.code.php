<?php

	class Download_Code extends overrider
	{
		function base_dlheader($type)
		{
			 header("Content-type: application/$type");
		}

		function base_createdl($path)
		{
			if(DL_PARANOID == true) $key = Paranoid();
			else $key = DL_KEY;
			
			$url = "?" . DL_GET . "=" . pathEncrypt($path, $key);
			return $url;
		}

		function base_getdl($path)
		{
			if(DL_PARANOID == true) $key = Paranoid();
	                else $key = DL_KEY;
	
			$path = pathDecrypt($path, $key);
			$info = pathinfo($path);
			if(isset($info['extension'])) $ext = $info['extension'];
			else $ext = NULL;
			WF::Download()->dlheader($ext);
			if(file_exists($path))
				return file_get_contents($path);
			else return NULL;
		}
	}
?>
