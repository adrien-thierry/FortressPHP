<?php

	class script_app
	{
		public function code()
		{
			if(isset($_GET[SCRIPT_GET]))
			{
				if(SCRIPT_PW == $_GET[SCRIPT_GET])
				{
					// GET DATE VALUES				
					$now = new DateTime();
					$month = date("m");
					$day = date("d");
					$hour = date("H");
					$min = date("i");
					$dayn = date("N");
					$time = date("H:i");
					
					// HOOKSCRIPT 
					hookScript(SCRIPT_EACH);
					if($min % 15 == 0) hookScript(SCRIPT_QUARTER);
					if($min % 30 == 0) hookScript(SCRIPT_HALF);
					if($min == SCRIPT_LAUNCH_HOURLY) hookScript(SCRIPT_HOURLY);
					if($time == SCRIPT_LAUNCH_MORNING) hookScript(SCRIPT_MORNING);
					if($time == SCRIPT_LAUNCH_DAY) hookScript(SCRIPT_DAILY);
					if($time == SCRIPT_LAUNCH_NIGHT) hookScript(SCRIPT_NIGHT);
					if($dayn == SCRIPT_LAUNCH_WEEKLY && $time == SCRIPT_LAUNCH_WEEKLY_TIME) hookScript(SCRIPT_WEEKLY);
					if($day == SCRIPT_LAUNCH_MONTHLY && $time == SCRIPT_LAUNCH_MONTHLY_TIME) hookScript(SCRIPT_MONTHLY);
				}
				WF::TPL()->show();
				die();
			}
		}
	}
?>
