<?php
	if(!defined("FORTRESSPHP")) header('Location: ../');
	$la = $GLOBALS['langage'];
	class description_mod
	{
		public function __construct()
		{
			$this->name = "description";
		}
		public function code()
		{
			addDiv("description");
				addDiv("zone1", "class='float zone justify'");
					echoImg($this->path . "img/blue.png", "blue", "class='imgfloat'");
					echoH1("INNOVATION");
						addDiv("text1");
							addP("I (Adrien) am always innovating. That's why I created FortressPHP and FortressJS");
						endDiv();
				endDiv();
				addDiv("zone2", "class='float zone justify'");
					echoImg($this->path ."img/red.png", "red", "class='imgfloat'");
					echoH1("PROTECTION");
						addDiv("text2");
							addP("FortressPHP is secure and fast");
						endDiv();
				endDiv();
				addDiv("zone3", "class='float zone justify'");
					echoImg($this->path ."img/green.png", "green", "class='imgfloat'");
					echoH1("TECHNOLOGY");
						addDiv("text3");
							addP("I try to use and improve technologies, everyday, evetytime");
						endDiv();
				endDiv();
			endDiv();
		}
	}
?>