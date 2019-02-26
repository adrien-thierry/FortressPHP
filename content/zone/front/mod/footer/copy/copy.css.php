<?php
	WF::Css()->tag("#footer");
		WF::Css()->style("background-color:#000;");
		WF::Css()->style("display:block");
		WF::Css()->style("clear:left");
		WF::Css()->style("padding-bottom:20px");
		WF::Css()->style("width:100%");
		WF::Css()->style("text-align:center");
		WF::Css()->style("color:white");
		WF::Css()->style("font-size:.9em");
	WF::Css()->endtag();
	WF::Css()->tag("#footer a");
		WF::Css()->style("color:white");
		WF::Css()->style("text-decoration:none");
	WF::Css()->endtag();	
	WF::Css()->tag("#footer a:hover");
		WF::Css()->style("text-decoration:underline");
	WF::Css()->endtag();
	WF::Css()->tag("#footer li");
		WF::Css()->style("list-style-type:none");
		WF::Css()->style("text-align:left");
		WF::Css()->style("clear:left");
	WF::Css()->endtag();
	WF::Css()->tag("#footer ul");
		WF::Css()->style("padding:0px");
	WF::Css()->endtag();
?>