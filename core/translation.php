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
	function getDefaultLanguage() 
	{
  		if (isset($_SERVER["HTTP_ACCEPT_LANGUAGE"]))
      			return $_SERVER["HTTP_ACCEPT_LANGUAGE"];
   		else
      			return "unknown";
		return strtolower($deflang);
	}
	function getL()
	{
		$l = getDefaultLanguage();
		if($l == null || strlen($l) < 2)	
			$a = 1;
		else
		{
			$l = substr($l, 0, 2);
			if($l == "fr")
				$a = 0;
			else
				$a = 1;
		}
		return $a;
	}
	function createLangage()
	{
		$_0 = array("Description", "Description");
		$_1 = array("French", "English");
		$_2 = array("French", "English");
		$_3 = array("French", "English");
		$_4 = array("French", "English");
		$_5 = array("French", "English");
		$_6 = array("Obtenir.", "Get.");
		$_7 = array("French", "English");
		$_8 = array("Pour nous contacter :", "Contact us :");
		$_9 = array("French", "English");
		$_10 = array("Obtenir SC3S", "Get SC3S");
		$_11 = array("Comprendre","Understand");
		$_12 = array("D&eacute;couvrir","Discover");
		$_13 = array("Nous suivre","Follow us");
		$_14 = array("Twitter","Twitter");
		$_15 = array("Store","Store");
		$_16 = array("E-commer&ccedil;ant","E-shopper");
		$_17 = array("Sur mesure","Made-to-measure");
		$_18 = array("Webmaster","Webmaster");
		$_19 = array("Choisissez votre E-CMS","Choose your E-CMS");
		$_20 = array("French", "English");
		$_21 = array("French", "English");
		$_22 = array("Mois","Months");
		$_23 = array("licences","<br />licenses");
		$_24 = array("Licence","License");
		$_25 = array("pour", "for");
		$_26 = array("POUR", "FOR");
		$_27 = array("Nous contacter","Contact us");
		$_28 = array("les ", "all");
		$_29 = array("French", "English");
		$_30 = array("T&eacute;l&eacute;chargements","Downloads");
		$_31 = array("Nous vous remercions de votre confiance", "Thank you for trusting us");
		$_32 = array("French", "English");
		$_33 = array("French", "English");
		$_34 = array("French", "English");
		$_35 = array("French", "English");
		$_36 = array("French", "English");
		$_37 = array("French", "English");
		$_38 = array("French", "English");
		$_39 = array("French", "English");
		$_40 = array("French", "English");
		$_41 = array("French", "English");
		$_42 = array("Accueil", "Home");
		$_43 = array("French", "English");
		$i = getL();
		$a = array($_0[$i], $_1[$i], $_2[$i], $_3[$i], $_4[$i], $_5[$i], $_6[$i], $_7[$i], $_8[$i], $_9[$i], $_10[$i], $_11[$i], $_12[$i], $_13[$i], $_14[$i], $_15[$i],$_16[$i],$_17[$i],$_18[$i],$_19[$i],$_20[$i],$_21[$i],$_22[$i],$_23[$i],$_24[$i],$_25[$i],$_26[$i],$_27[$i],$_28[$i],$_29[$i],$_30[$i], $_31[$i],$_32[$i],$_33[$i],$_34[$i],$_35[$i],$_36[$i],$_37[$i],$_38[$i],$_39[$i],$_40[$i],$_41[$i],$_42[$i], $_43[$i]);
		return $a;
	}
?>
