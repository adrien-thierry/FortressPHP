<?php
class contact_form_mod
{
		public function code()
		{			
			addDiv("contact_form");
			$email = 'contact@your-domain.com'; $site = 'your-website.com'; $lang = 'en';

			$ok = false;
			$erreur = "";
			$erreuren = "";
			$lang= "en";
			$cryptinstall= $this->path . "crypt/cryptographp.fct.php";
			include $cryptinstall;  

			if($_POST)
			{
				$from = htmlentities(stripslashes($_POST['e-mail']));
				$title1 = stripslashes($_POST['objet']);
				$title = "Message d'un visiteur [$title1]";
				$content = stripslashes($_POST['message']);
				$nom = ucfirst(stripslashes($_POST['nom']));
				$prenom = ucfirst(stripslashes($_POST['prenom']));
				$infosclient = "";
				
				if(strlen($title1) > 0)
				{
					if($content != '<br>' OR $content !=  '') 
					{
						if($nom != '') 
						{
							if($prenom != '')
							{
								$auteur = $prenom.' '.$nom;
							}
							else
							{
								$auteur = $nom;
							}

							if(chk_crypt($_POST['code']))
							{
								if (getenv("HTTP_CLIENT_IP"))
								$ip = getenv("HTTP_CLIENT_IP");
								elseif(getenv("HTTP_X_FORWARDED_FOR"))
								$ip = getenv("HTTP_X_FORWARDED_FOR");
								else
								$ip = getenv("REMOTE_ADDR");

								$useragent = $_SERVER['HTTP_USER_AGENT'];
								require_once('libs/useragent.php');

								$infosclient .= '<hr /><p>IP : <a href="http://ipgetinfo.com/index.php?ip='.$ip.'">'.$ip.'</a><br />';
								
								if(isset($_SERVER['GEOIP_CITY']) && $_SERVER['GEOIP_CITY'] != '')
								$infosclient .= 'Localisation : '.utf8_encode($_SERVER['GEOIP_CITY']).', '.$_SERVER['GEOIP_COUNTRY_NAME'].' (<a href="http://maps.google.com/maps?q='.$_SERVER['GEOIP_LATITUDE'].','.$_SERVER['GEOIP_LONGITUDE'].'">carte</a>)<br />';
								
								$infosclient .= 'User-agent : '.$useragent.'<br />';
								$userinfo = get_ua_info($useragent);
								$infosclient .= 'Navigateur : '.$userinfo['name'].' '.$userinfo['ua_version'].'<br />';
								$infosclient .= 'OS : '.$userinfo['os'].' '.$userinfo['os_version'].'</p>';
								
								$auteur = utf8_encode($auteur);
								$titre = utf8_encode($title);
								$contenu = utf8_encode($content.$infosclient);
								
								//$headers  = 'MIME-Version: 1.0' . "\r\n";
								//$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
								
								$headers  = 'MIME-Version: 1.0' . "\r\n";
								$headers .= 'Content-type: text/html;' . "\r\n";
								
								$headers .= 'From: '.$auteur.' <'.$from.'>' . "\r\n";
								if (@mail($email,$titre,$contenu,$headers))
								$ok = true;
								else
								{
								$erreur = 'Votre message n\'a pas �t� envoy� pour une raison inconnue, merci de r�essayer plus tard.';
								$erreuren = 'Your message hasn\'t been delivered because of an unknown reason, please try again later.';
								}
								if($_POST['copie'])
								{
									//$email = $from;
									//@mail($email,$titre,$contenu,$headers);
								}
							}
							else
							{
							$erreur = 'Code de v�rification incorrect.';
							$erreuren = 'Checking code incorrect.';
							}
						}
						else
						{
						$erreur = 'Merci de renseigner le champs Nom';
						$erreuren = 'You must enter your name.';
						}
					}
					else
					{
					$erreur = 'Merci de renseigner le message';
					$erreuren = 'You must enter your message.';
					}
				}
				else
				{
				$erreur = 'Merci de renseigner l\'objet du message.';
				$erreuren = 'You must enter the object of message.';
				}
			}
			//else {
			//header('Location: install.php');
			//}

			// systeme de langue

			if (isset($_GET['lang']) && $_GET['lang'] == "fr" OR isset($_GET['lang']) && $_GET['lang'] == "en")
			{
				$lang2 = $_GET['lang'];
			}
			else
			{
				$lang2 = $lang;
			}


			if ($lang2 == "fr")
			{
			?>
						<script type="text/javascript">
						function valideMail(type)
						{
							var mail = document.getElementById('e-mail').value;
							var verif = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]{2,}[.][a-zA-Z]{2,4}$/;
							if (verif.exec(mail) == null)
							{
								if(type == 'default')
								document.getElementById('statusmail').innerHTML = 'L\'adresse e-mail est invalide';
								document.getElementById('statusmail').className = 'rouge';
								document.getElementById('send').disabled=true;
								return false;
							}
							else
							{
								if(type == 'default')
								document.getElementById('statusmail').innerHTML = 'L\'adresse e-mail est valide';
								document.getElementById('statusmail').className = 'vert';
								document.getElementById('send').disabled=false;
								return true;
							}
						}
						var langue = '<?php echo $lang2; ?>',
							bouton = document.getElementById('boutonChanger') ;

						bouton.disabled = true ;
						function changeDisabled(valeur) {
						  if (valeur==langue) {
							 bouton.disabled = true ;
						  }
						  else {
							 bouton.disabled = false ;
						  }
						}
						</script>
					</head>
				<body><div class="encadre"><div class="interieur">
				<center><h1>Formulaire de contact</h1>
				<form method="post" action="contact?lang=fr">
				<?php	
				if(!$ok)
				{

				if($erreur != '') {
					echo '<table><tr><td><img src="' . $this->path . 'images/erreur.png" /></td>';
					echo '<td><p class="error" style="color:red;">'.$erreur.'</p></td></tr></table>';
				}
				?>
				<p><table>
					<tr>
						<td><label for="nom">Name *</label> : <br /></td>
						<td><input type="text" name="nom" id="nom" size="66" tabindex="10" value="<?php if(isset($_POST['nom'])) echo $_POST['nom']; ?>" /></td>
					</tr>
					<tr>
						<td><label for="prenom">Firstname</label> : <br /></td>
						<td><input type="text" name="prenom" id="prenom" size="66" tabindex="20" value="<?php if(isset($_POST['prenom']))echo $_POST['prenom']; ?>" /></td>
					</tr>
					<tr>
						<td><label for="e-mail">E-mail *</label> : <br /></td>
						<td><input type="text" onchange="javascript:valideMail('default');" onblur="javascript:valideMail('default');" onkeyup="javascript:valideMail('default');" name="e-mail" id="e-mail" size="66" tabindex="25" value="<?php if(isset($_POST['e-mail']))echo $_POST['e-mail']; ?>" /><br />
						<span id="statusmail"></span></td><br />
					</tr>
					<tr>
						<td><label for="objet">Object *</label> : <br /></td>
						<td><input type="text" name="objet" id="objet" size="66" tabindex="30" value="<?php if(isset($_POST['objet']))echo $_POST['objet']; ?>"/></td>
					</tr>
					<tr>
						<td><label for="message">Your message *</label> : <br /></td>
						<td><textarea name="message" id="message" rows="11" cols="50" tabindex="40"><?php if(isset($_POST['message']))echo $_POST['message']; ?></textarea><br />
					</tr>
					<tr>
						<td><label for="code">Enter the code *</label> : <br /></td>
						<td><?php dsp_crypt(0,1); ?><input type="text" name="code" id="code"></td>
					</tr>
				</table></p>
				<p><input type="submit" value="Envoyer" name="send" id="send" />
				</form><br />
				<form action="?p=contact" method="post"><input type="submit" value="Reset" /></form>
				</p>
				<?php
				}
				else
				echo '<div id="back"><table><tr><td><img src="' . $this->path . 'images/info.png" /></td><td><p style="color:green;">Votre message a bien �t� envoy�.</p></td></tr></table></div>';
				?>
				</div></div>
				<div  id="lang" style="display:none;">
				<center><h2>Changer la langue du formulaire</h2><br />
				<form method="get" action="contact" class="copy">
				<select name="lang" id="langf" onchange="changeDisabled(this.value)">
				<option value="fr" selected="selected">Fran�ais</option>
				<option value="en">English</option></select>
				<input type="submit" value="Valider" id="boutonChanger" />
				</form>
				</center></div>
				<script type="text/javascript">
				if(valideMail('noprint') != true)
				document.getElementById('send').disabled=true;
				</script>
				</body>
				</html>
			<?php
			}
			elseif ($lang2 == "en")
			{ ?>
						<script type="text/javascript">
						function valideMail(type)
						{
							var mail = document.getElementById('e-mail').value;
							var verif = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]{2,}[.][a-zA-Z]{2,4}$/;
							if (verif.exec(mail) == null)
							{
								if(type == 'default')
								document.getElementById('statusmail').innerHTML = 'The e-mail address is not valid';
								document.getElementById('statusmail').className = 'rouge';
								document.getElementById('send').disabled=true;
								return false;
							}
							else
							{
								if(type == 'default')
								document.getElementById('statusmail').innerHTML = 'The e-mail address is valid';
								document.getElementById('statusmail').className = 'vert';
								document.getElementById('send').disabled=false;
								return true;
							}
						}
						function lang()
						{
							var langform = document.getElementById('langform').value;
							if (langform == 'en')
							{
								document.getElementById('sendlang').disabled=false;
							}
							else
							{
								document.getElementById('sendlang').disabled=true;
							}
						}
						</script>
					</head>
				<body><div class="encadre"><div class="interieur">
				<center><h1>Contact formulary</h1>
				<form method="post" action="?p=contact">
				<?php
				if(!$ok)
				{

				if($erreuren != '') {
					echo '<table><tr><td><img src="' . $this->path . 'images/erreur.png" /></td>';
					echo '<td><p class="error" style="color:red;">'.$erreuren.'</p></td></tr></table>';
				}
				?>
				<p><table>
					<tr>
						<td><label for="nom">Surname *</label> : <br /></td>
						<td><input type="text" name="nom" id="nom" size="66" tabindex="10" value="<?php if(isset($_POST['nom']))echo $_POST['nom']; ?>" /></td>
					</tr>
					<tr>
						<td><label for="prenom">First name</label> : <br /></td>
						<td><input type="text" name="prenom" id="prenom" size="66" tabindex="20" value="<?php if(isset($_POST['prenom']))echo $_POST['prenom']; ?>" /></td>
					</tr>
					<tr>
						<td><label for="e-mail">Your e-mail *</label> : <br /></td>
						<td><input type="text" onchange="javascript:valideMail('default');" onblur="javascript:valideMail('default');" onkeyup="javascript:valideMail('default');" name="e-mail" id="e-mail" size="66" tabindex="25" value="<?php if(isset($_POST['e-mail']))echo $_POST['e-mail']; ?>" /><br />
						<span id="statusmail"></span></td><br />
					</tr>
					<tr>
						<td><label for="objet">Object *</label> : <br /></td>
						<td><input type="text" name="objet" id="objet" size="66" tabindex="30" value="<?php if(isset($_POST['objet']))echo $_POST['objet']; ?>"/></td>
					</tr>
					<tr>
						<td><label for="message">Your message *</label> : <br /></td>
						<td><textarea name="message" id="message" rows="11" cols="50" tabindex="40"><?php if(isset($_POST['message']))echo $_POST['message']; ?></textarea><br />
					</tr>
					<tr>
						<td><label for="code">Enter the code *</label> : <br /></td>
						<td><?php dsp_crypt(0,1); ?><input type="text" name="code" id="code"></td>
					</tr>
				</table></p>
				<p><input type="submit" value="Send" name="send" id="send" /></form><br />
				<form action="?p=contact" method="post"><input type="submit" value="Reset" /></form>
				</p>
				<?php
				}
				else
				echo '<div id="back"><table><tr><td><img src="' . $this->path . 'images/info.png" /></td><td><p style="color:green;">Your message has been sent.</p></td></tr></table></div>';
				?>
				</div></div>
				<script type="text/javascript">
				if(valideMail('noprint') != true)
				document.getElementById('send').disabled=true;
				</script>
				</body>
				</html>
			<?php
			}
			endDiv();	
		}
}