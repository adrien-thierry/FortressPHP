<?php
	class initdb_app
	{
		public function code()
		{
			if(DB_STATE)
			{
				WF::DB()->initiate();
			}
		}
	}
?>
