<?php
class head_mod
{
	public function code ()
	{
		WF::Html()->div("head");
			WF::Html()->h1("FortressPHP");
			WF::Html()->div("p");
			WF::Html()->enddiv();
		WF::Html()->enddiv();
	}
}
?>
