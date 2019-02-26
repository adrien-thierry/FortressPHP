<?php
	class home_page
	{
		public function code()
		{
			if(!defined("FORTRESSPHP")) header('Location: ../');
			require("homeFunctions.php");
			$la = $GLOBALS['langage'];

		}
	}

?>
