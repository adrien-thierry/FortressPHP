<?php
	require_once("admin.conf.php");
	function hashit($data)
	{
		return hash('sha512', $data);
	}

	class admin
	{
		
		
		
		public function __construct() 
		{
			
		}
		
		public function getAccess()
		{
			$admin = new AdminManager();
			$b = false;
			
			if(isset($_POST['login']) && isset($_POST['password']))
			{
				
				$login = hashit($_POST['login']);
				$hash = substr($login, 0, 10);
				$pass = hashit($hash . $_POST['password']);
				$admin_conf = new admin_conf();
				$admintab = $admin_conf->admintab;
		
				
				foreach ($admintab as $tab)
				{
					if($tab["login"] == $login && $tab["password"] == $pass)
					{
						$b = true;
						$tmp = $admin->GetTmp();
						$admin->WriteCookie($tmp, $tab["id"], $tab["username"]);
						$admin->SetAdminCookie($tmp);
						break;
					}
				}
				if(!$b) echo "Username or password incorrect";
				
			}
			if(!$b) $this->getForm();
			else $this->getAdmin();
		}
		private function getForm()
		{
			echoDoctype();
				// HTML
				echoHtmlStart();
				//HEAD META
				echoHeadStart();
						linkCss(BASE_SCRIPT."?c=admin");
				echoHeadEnd();
				// BODY
				echoBodyStart();
				// HEADER
					// PAGE
					addDiv("global");
						// ADD PAGE
						addDiv("admin");
							echoH1("ADMIN AREA");
							addDiv("login");
								addDiv("loginbox");
									echo "
									<form method='POST'>
										login 		: <input name='login'><br />
										password 	: <input name='password'><br />
										<input name='submit' type='Submit' value='Connection'>
									</form>
									";
								endDiv();
							endDiv();
						endDiv();
					endDiv();
				// BODY END
				echoBodyEnd();
				// HTML END
				echoHtmlEnd();
		}
		private function getAdmin()
		{
			echoDoctype();
			// HTML
			echoHtmlStart();
			//HEAD META
			echoHeadStart();
					linkCss(BASE_SCRIPT."?c=admin");
			echoHeadEnd();
			// BODY
			echoBodyStart();
			// HEADER
				addDiv("header");
					// HEADER
				endDiv();
				// PAGE
				addDiv("global");
					// ADD PAGE
					addDiv("admin");
						echoH1("ADMIN AREA");
					endDiv();
				endDiv();
			// BODY END
			echoBodyEnd();
			// HTML END
			echoHtmlEnd();
		}
	}


?>