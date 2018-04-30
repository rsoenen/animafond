<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>  <!-- norme html 5 -->
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../css/style_menu.css">
	<link rel="stylesheet" type="text/css" href="../css/style_connexion.css">
	<title> Site d'anima'fond, une association de cirque </title>
</head>
<body>
<?php include("squelettePage/menu.php"); ?>
<div id="mainDiv" class= "col-md-8 col-md-offset-2">
<?php
	if(isset($_POST['mailutilisateur'])&&isset($_POST["pseudo"])){

		include ("../manager/UtilisateurManager.php");

		$mail=$_POST['mailutilisateur'];
		$utilisateurManager = new UtilisateurManager();
		$utilisateurManager->setDb($mainManager->getDb());

		$cle = $utilisateurManager->generateToken($_POST["pseudo"], $mail);

		//ENVOIE DU MESSAGE AVEC LA CLE GENERE
		if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail)){ //s'adapte aux diffÃƒÂ©rentes normes{
			$passage_ligne = "\r\n";
		}
		else{
			$passage_ligne = "\n";
		}
		$boundary = "-----=".md5(rand());
		$header = "From: \"ADMIN\"<admin@animafond.com>".$passage_ligne; //PERSONNE QUI ENVOIE LE MESSAGE
		$header .= "Reply-to: \"".$_POST['pseudo']."\" <".$mail.">".$passage_ligne; //PERSONNE QUI RECOIT LE MESSAGE
		$header .= "MIME-Version: 1.0".$passage_ligne;
		$header .= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;
		
		$message_txt ="Bonjour".$passage_ligne.$passage_ligne."Merci de cliquer sur le lien ci-dessous afin de changer votre mot de passe :".$passage_ligne;
		$message_txt .= "http://www.animafond.com/generateurmdp.php?cle=".$cle.$passage_ligne.$passage_ligne;
		$message_txt .="L'équipe d'animafond".$passage_ligne.$passage_ligne."P.S. : Ceci est un mail automatique, merci de ne pas répondre";
		$sujet = "Nouveau mot de passe";
		
		//=====CrÃƒÂ©ation du message.
		$message = $passage_ligne."--".$boundary.$passage_ligne;
		//=====Ajout du message au format texte.
		$message.= "Content-Type: text/plain; charset=\"ISO-8859-1\"".$passage_ligne;
		$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
		$message.= $passage_ligne.$message_txt.$passage_ligne;
		//==========
		$message.= $passage_ligne."--".$boundary.$passage_ligne;
		
		mail($mail,$sujet,$message,$header);
		echo 'Un message vous a &eacute;t&eacute; envoy&eacute; sur votre adresse mail pour changer votre mot de passe';
		}
	else {
	
	
?>
		<div class="col-md-6 col-md-offset-3">
		<h2>MOT DE PASSE OUBLI&Eacute;?</h2>
		<form method="POST" action="motdepasseoublie.php">

			<div class="form-group">
				<label class="col-sm-4 control-label" for="pseudo">Entrez votre pseudo</label>
				<input type="text" name="pseudo"/>
			</div>
			<div class="form-group">
				<label class="col-sm-4 control-label" for="mailutilisateur">Entrez votre adresse mail</label>
				<input type="mail" name="mailutilisateur"/>
			</div>
			<input type="submit" class="btn btn-default" value="Valider"/>
		</form>
		</div>
			<?php
			}
			include("squelettePage/footer.php");
?>

</div>
</body></html>