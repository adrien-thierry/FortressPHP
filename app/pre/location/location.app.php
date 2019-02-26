<?php

	class location_app
	{
		public function code()
		{
			if(full_path() != MAIN_URL)
			{
				header("Location: " . MAIN_URL);
			}
		}
	}

?>
