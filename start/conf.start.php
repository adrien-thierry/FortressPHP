<?php
	if(!defined("FORTRESSPHP")) header('Location: ../');

	// STATIC LOAD ORDER
	// CHANGE ONLY IF YOU KNOW WHAT YOU DO
	Load::Base("conf"); // BASIC CONFIG
	Load::Base("essential"); // ESSENTIAL FILES
	Load::Base("core"); // CORE FILES
	Load::Base("util"); // UTILS FILES
	Load::Base("layer"); // LAYERS FILES

	// DYNAMIC LOAD CLASS FOR OVERRIDE, DON'T TOUCH
	Load::Dynamic();

	// APP LOAD ORDER
	// COMMENT / UNCOMMENT WHAT YOU WANT TO ACTIVATE / DEACTIVATE
	Launch("inc"); // ADD INCLUDE FILE
	Launch("pre"); // MAKE PRE-TREATEMENT ON REQUEST / IP ...
	Launch("route"); // REDIRECT REQUEST TRAJECT
	Launch("filter"); // FILTER CONTENT
	Launch("view"); // ADD VIEW 
	Launch("post"); // MAKE POST-TREATMENT ON VIEW / REQUEST ...
	
	// SHOW RESULT
	WF::TPL()->show();	

	/* 
	Tools::overrideMethod("WF_Download", "wf_dlheader", '$a', 'echo "BLA";');
	echo WF::WF_Download()->wf_dlheader("test");
	*/


?>

