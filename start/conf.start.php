<?php

/*

FortressPHP
Copyright (C) 2019  Adrien THIERRY

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.

*/

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

