<?php
	if(!defined("FORTRESSPHP")) header('Location: ../');
	class example_mod
	{
		public function __construct()
		{
			$this->name = "example";
		}
		public function code()
		{
			$la = $GLOBALS['langage'];
				addDiv("example");
					echoH1("EXAMPLE");
						addDiv("examplediv", "class='float zone justify'");
								addP("Example");
						endDiv();
					echoImg($this->path . "img/getit.jpg", "Example", "class='imgfloat'");
					
				endDiv();
		}
	}
?>