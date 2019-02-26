<?php

	class script_conf
	{
		var $state = true;
		var $pos = 1;
	}


	define("SCRIPT_PW", "password");
	define("SCRIPT_GET", "script");

	define("SCRIPT_LAUNCH_HOURLY", "00"); // 00 -> 59
	define("SCRIPT_LAUNCH_MORNING", "9"); // 00 -> 24
	define("SCRIPT_LAUNCH_DAY", "12");  // 00 -> 24
	define("SCRIPT_LAUNCH_NIGHT", "20"); // 00 -> 24
	define ("SCRIPT_LAUNCH_WEEKLY", "1"); // 1 -> 7
	define ("SCRIPT_LAUNCH_WEEKLY_TIME", "9:00"); // 24:59
	define ("SCRIPT_LAUNCH_MONTHLY", "1"); // 01 -> 31
	define ("SCRIPT_LAUNCH_MONTHLY_TIME", "9:00"); // 24:59

	define("SCRIPT_EACH", "each");
	define("SCRIPT_HALF", "half");
	define("SCRIPT_QUARTER", "quarter");
	define("SCRIPT_HOURLY", "hourly");
	define("SCRIPT_DAILY", "daily");
	define("SCRIPT_MORNING", "morning");
	define("SCRIPT_NIGHT", "night");
	define("SCRIPT_WEEKLY", "weekly");
	define("SCRIPT_MONTHLY", "monthly");

?>
