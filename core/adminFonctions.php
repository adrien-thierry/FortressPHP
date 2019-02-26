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

	class AdminManager
	{
		var $hash;
		
		public function __construct()
		{
			$this->hash = date("m.d.y");
			$this->hash = hash("sha512", $this->hash);
		}
		public function GetTmp()
		{
			return hash("sha512", microtime());
		}
		public function WriteCookie($tmp, $id, $username)
		{
			$cookie = file_get_contents( CONTENT_FOLDER . SQUEL_FOLDER . "cookie.php" );
			$cookie = str_replace("[TMP]", $tmp, $cookie);
			$cookie = str_replace("[ID]", $id, $cookie);
			$cookie = str_replace("[USERNAME]", $username, $cookie);
			file_put_contents( CONTENT_FOLDER . TMP_FOLDER . "cookie_" . $tmp . ".php", $cookie);
		}
		public function DeleteCookie($tmp)
		{
			if(isset( $_COOKIE[ $hash ]) ) unset( $_COOKIE[ $hash ] );
			$file = CONTENT_FOLDER . TMP_FOLDER . "cookie_" . $tmp . ".php";
			if( file_exists( $file ) ) unlink( $file );
		}
		public function SetAdminCookie($value)
		{
			setcookie($this->hash, $value, time()+3600); 
		}
	}
?>