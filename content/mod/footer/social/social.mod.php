<?php
	if(!defined("FORTRESSPHP")) header('Location: ../');
	class social_mod
	{
		/*public function __construct()
		{
			$this->name = "social";
		}*/
		public function code()
		{
			$this->path;
			addDiv("social");
				echoImgLink($this->path . "img/" . "social_twitter.png", "http://www.twitter.com/adrien-thierry", "Twitter", "id='social-twitter'", "target='_blank'");
				echoImgLink($this->path . "img/" . "social_facebook.png", "https://www.facebook.com/nectrium", "Facebook", "id='social-facebook'", "target='_blank'");
				echoImgLink($this->path . "img/" . "social_pinterest.png", "https://github.com/adrien-thierry/", "Pinterest", "id='social-pinterest'", "target='_blank'");
			endDiv();
		}
	}
?>