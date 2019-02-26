<?php

	class Secured_Img extends Overrider
	{

		function base_imgheader($type)
		{
			 header("Content-type: image/png");

		}

		function base_createimg($path)
		{
			if(IMG_PARANOID == true) $key = Paranoid();
			else $key = IMG_KEY;		
			$url = "?" . IMG_GET . "=" . pathEncrypt($path, $key);
			return $url;
		}

		function base_getimg($path)
		{
			if(IMG_PARANOID == true) $key = Paranoid();
                	else $key = IMG_KEY;
			$path = pathDecrypt($path, $key);
			$info = pathinfo($path);
			if(isset($info['extension'])) $ext = $info['extension'];
			else $ext = NULL;
			WF::Img()->imgheader($ext);
			//header('Content-Length: ' . filesize($path));
			if(file_exists($path))
				return file_get_contents($path);
			else return NULL;
		}
	}
?>