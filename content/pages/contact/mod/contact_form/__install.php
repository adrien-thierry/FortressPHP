<?php
$filename = 'infos.php';
$version = '1.4';

if (file_exists($filename)) {
    $file = true;
} else {
    $file = false;
}

if($file == false)
{
	
	if($_POST)
	{
		$site = $_POST['site'];
		$lang = $_GET['lang'];
		$mail = htmlentities(stripslashes($_POST['email']));
		if(preg_match("#^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]{2,}\.[a-zA-Z]{2,4}$#",$mail))
		{
			if($site != '' AND $lang !='')
			{
				$finfos = fopen('infos.php', 'a');
				$texte = '<?php $email = \''.$mail. '\';';
				$texte .= ' $site = \''.$site.'\';';
				$texte .= ' $lang = \''.$lang.'\';';
				fputs($finfos, $texte);
				fclose ($finfos);
				$ok = true;
				
				if($ok == true)
				{
					$a = $mail;
					$title = "Installation de ContactForm terminé avec succés !";
					$titre = utf8_encode($title);
					$content = "<div style=\"font-family:Verdana;\"><p>Bonjour,</p>
					
					<p>Nous vous remercions d'avoir installer ContactForm !<br />
					Les mails envoy&eacute;s par le formulaire seront envoy&eacute;s &agrave; cette adresse e-mail:<br />
					$a</p>
					
					<p>Cordialement,<br />
					L'&eacute;quipe de <a href=\"http://www.mes-scripts-php.com\">Mes Scripts PHP.com.</a></p></div>";
					$headers  = 'MIME-Version: 1.0' . "\r\n";
					$headers .= 'Content-type: text/html; charset=iso-8859-15' . "\r\n";
					$headers .= 'From: ContactForm <ne-pas-repondre@clementdugal.com>' . "\r\n";
					$contenu = utf8_encode($content);
					@mail($a,$titre,$contenu,$headers);
				}
			}
			else
			$erreur = 'Merci de remplir tous les champs.';
			$erreuren = 'Thanks to fill all the blanks.';
		}
		else
		$erreur = 'Votre adresse email n\'est pas valide.';
		$erreuren = 'The address e-mail is not valid.';
	}
}
else
{
	$erreur = 'Le fichier de configuration "infos.php" est déjà créé, supprimez le fichier "install.php".';
	$erreuren = 'The setting file "infos.php" has already been created, delete the file "install.php.';
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=iso-8859-15" />
		<title>Installation | Setting up</title>
		<link href="styleform.css" rel="stylesheet" type="text/css" media="screen" />
		<link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico" />
	</head>
<body><div class="encadre">

<?php
if ($_GET['lang'] == "fr")
{ ?>
	<!-- Installation en français -->
	<center><h1>Installation de ContactForm v<?php echo $version; ?></h1>
	<?php
	if($file == false)
	{
		if(!$ok)
		{

		if($erreur != '')
		echo '<table><tr><td><img src="images/erreur.png" /></td>';
		echo '<td><p class="error" style="color:red;">'.$erreur.'</p></td></tr></table>';

		?>
		<form method="post" action="install.php?lang=fr">
		<p>Veuillez renseigner l'adresse e-mail sur laquelle le formulaire pointera et l'url de votre site (utilisé pour le bouton Retour).</p>
		<p><table>
			<tr>
				<td><label for="email">Adresse email</label> : <br /></td>
				<td><input type="text" name="email" id="email" size="40" tabindex="10" value="<?php echo$_POST['email']; ?>" /></td>
			</tr>
			<tr>
				<td><label for="site">Votre site (ex: http://www.monsite.com/)</label> : <br /></td>
				<td><input type="text" name="site" id="site" size="40" tabindex="30" value="<?php echo $_POST['site']; ?>" /></td>
			</tr>
		</table></p>
		<p><input type="submit" value="Envoyer" /><input type="reset" value="Remise à zéro" /></p>
		</form>
		<?php
		}
		else
		{
		echo '<table><tr><td><img src="images/info.png" /></td><td><p style="color:green;">Le fichier de configuration "infos.php" à bien été créé.</p></td></tr></table>';
		echo '<p>Supprimez maintenant le fichier "install.php" de votre serveur pour finaliser l\'installation de ContactForm.</p>';
		echo '<p><a href="contact.php">Aller sur le formulaire de contact</a> | <a href="'.$site.'">Allez sur votre site</a></p>';
		}
	}
	else
	{
		if($erreur != '')
		echo '<table><tr><td><img src="images/erreur.png" /></td>';
		echo '<td><p class="error" style="color:red;">'.$erreur.'</p></td></tr></table>';
	}
	?>
	</center></div>
	<center><p class="copy">Ce formulaire a été généré par <a href="http://www.mes-scripts-php.com/" class="blanc">ContactForm, un script de Mes-scripts-PHP.com</a>.</p></center>
	</body></html>
<?php
}
elseif ($_GET['lang'] == "en")
{ ?>
	<!-- Installation en anglais -->
	<center><h1>ContactForm v<?php echo $version; ?> setting up</h1>
	<?php
	if($file == false)
	{
		if(!$ok)
		{

		if($erreuren != '')
		echo '<table><tr><td><img src="images/erreur.png" /></td>';
		echo '<td><p class="error" style="color:red;">'.$erreuren.'</p></td></tr></table>';

		?>
		<form method="post" action="install.php?lang=en">
		<p>Please fill in your e-mail on which the form will point and url of your site (used for the Back button).</p>
		<p><table>
			<tr>
				<td><label for="email">E-mail</label> : <br /></td>
				<td><input type="text" name="email" id="email" size="40" tabindex="10" value="<?php echo$_POST['email']; ?>" /></td>
			</tr>
			<tr>
				<td><label for="site">Your website (ex: http://www.yourwebsite.com/)</label> : <br /></td>
				<td><input type="text" name="site" id="site" size="40" tabindex="30" value="<?php echo $_POST['site']; ?>" /></td>
			</tr>
		</table></p>
		<p><input type="submit" value="Submit" /><input type="reset" value="Reset" /></p>
		</form>
		<?php
		}
		else
		{
		echo '<table><tr><td><img src="images/info.png" /></td><td><p style="color:green;">The setting file has been created</p></td></tr></table>';
		echo '<p>Now delete the file "install.php" from your server for complete installation of ContactForm.</p>';
		}
	}
	else
	{
		if($erreuren != '')
		echo '<table><tr><td><img src="images/erreur.png" /></td>';
		echo '<td><p class="error" style="color:red;">'.$erreuren.'</p></td></tr></table>';
	}
	?>
	</center></div>
	<center><p class="copy">This formulary is generated by <a href="http://www.mes-scripts-php.com/" class="blanc">ContactForm, a script of Mes-scripts-PHP.com</a>.</p></center>
	</body></html>
<?php
}
elseif ($file == true)
{ ?>
	<!-- Déjà installé -->
	<center><h1>Erreur | Error</h1>
	<p><table><tr><td><img src="images/erreur.png" /></td>
	<td><p class="error" style="color:red;">ContactForm est déjà installé !<br />ContactForm is already installed !</p></td></tr></table></p>
	</center></div>
	<center><p class="copy">Ce formulaire a été généré par <a href="http://www.mes-scripts-php.com/" class="blanc">ContactForm, un script de Mes-scripts-PHP.com</a>.</p></center>
	</body></html>
<?php }
else
{ ?>
	<!-- Choix de la langue d'installation -->
	<center><h1>Langue | Language</h1>
	
	<form action="install.php" method="get">
	<p>
	   <label for="lang">Langue d'installation</label> :<br />
	<select name="lang" id="lang">
	   <option value="fr">Français</option>
	   <option value="en">English</option>
	</select>
	<input type="submit" value="Valider" />
	</form>
		</center></div>
	<center><p class="copy">Ce formulaire a été généré par <a href="http://www.mes-scripts-php.com/" class="blanc">ContactForm, un script de Mes-scripts-PHP.com</a>.</p></center>
	</body></html>
<?php }

