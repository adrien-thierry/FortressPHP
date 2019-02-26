<?php
	if(!defined("FORTRESSPHP")) header('Location: ../');

	class description_mod
	{
		public function __construct()
		{
			$this->name = "description";
		}
		public function code()
		{
			WF::Html()->div("description");
			WF::Html()->p("FortressPHP is a secure, simple and fast PHP Framework");
			WF::Html()->enddiv();
		}
	}
?>
