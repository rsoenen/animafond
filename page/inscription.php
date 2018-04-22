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
<?php 
	include("squelettePage/menu.php");
	?>

<div id="mainDiv" class="col-md-8 col-md-offset-2">
<?php //vérification des différents champs
	if(isset($_POST['flag'])){
		include ("../manager/UtilisateurManager.php");
		$utilisateurManager = new UtilisateurManager();
		$utilisateurManager->setDb($mainManager->getDb());

		if(isset($_POST['pseudo'])){ //Verification que le pseudo souhaité n'est pas déjà pris
			$cond5 = $utilisateurManager ->pseudoAlreadyUse($_POST['pseudo']);
			if ($cond5 == true){
				echo "<u><b>Le pseudo que vous voulez prendre est d&eacute;jà utiliser</b></u><br/>";
			} else{
				$cond5 = true;
			}
		}
		$cond1=$cond2=$cond3=$cond4=true;
		if(strlen($_POST['pseudo'])<4){echo '<u><b>Votre pseudo doit comporter 4 caractères au minimum</b></u><br/>';$cond1=false;} 
		if($_POST['mdp']!=$_POST['mdp2']){echo '<u><b>La confirmation du mot de passe ne correspond pas au mot de passe.</b></u><br/>';$cond2=false;}
		if(strlen($_POST['mdp'])<6){echo '<u><b>Veuillez entrer un mot de passe d\'au moins 6 caractère.</b></u><br/>';$cond3=false;}
		if(strlen($_POST['mail'])<1){echo '<u><b>Veuillez entrer une adresse mail.</b></u><br/>';$cond4=false;}
		if($cond1==true&&$cond2==true&&$cond3==true&&$cond4==true&&$cond5==true){
			$utilisateur = new Utilisateur();
			$utilisateur ->setPseudo($_POST['pseudo']);
			$utilisateur -> setMail($_POST["mail"]);
			$utilisateur -> setMdp(sha1($_POST['mdp']));
			if($_POST['sexe']=='homme'){$homme=true;}
			if($_POST['sexe']=='femme'){$homme=false;}
			$utilisateur -> setHomme($homme);

			$utilisateurManager -> add($utilisateur);
			
			 $mail='animafond@live.fr';
				if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail)){ //s'adapte aux différentes normes{
					$passage_ligne = "\r\n";
				}
				else{
					$passage_ligne = "\n";
				}
				$boundary = "-----=".md5(rand());
				$header = "From: \"".$pseudo."\"<".$_POST['mail'].">".$passage_ligne; //PERSONNE QUI ENVOIE LE MESSAGE
				$header .= "Reply-to: \"Admin\" <".$mail.">".$passage_ligne; //PERSONNE QUI RECOIT LE MESSAGE
				$header .= "MIME-Version: 1.0".$passage_ligne;
				$header .= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;
				
				$message_txt ="De ".$pseudo.", ".$_POST['mail'].$passage_ligne.$passage_ligne."Une nouvelle personne s'est inscrite sur le site: ".$pseudo.", son adresse mail est ".$_POST['mail'].".";
				$sujet = "Un nouvelle utilisateur";
				
				//=====Création du message.
				$message = $passage_ligne."--".$boundary.$passage_ligne;
				//=====Ajout du message au format texte.
				$message.= "Content-Type: text/plain; charset=\"ISO-8859-1\"".$passage_ligne;
				$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
				$message.= $passage_ligne.$message_txt.$passage_ligne;
				//==========
				$message.= $passage_ligne."--".$boundary.$passage_ligne;
				
				mail($mail,$sujet,$message,$header);

			header('Location:confirmation.php');
		}
		
	}
?>
<form action="inscription.php"  class="form-horizontal" method="POST">
	<input type="hidden" name="flag" value="oui">
	<div class="form-group">
		<label for="pseudo" class="col-sm-2 control-label">Votre pseudo :</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" name="pseudo" required="required" value="<?php if(isset($_POST['pseudo'])){echo $_POST['pseudo'];}?>"/>
		</div>
	</div>
	<div class="form-group">
		<label for="mdp" class="col-sm-2 control-label">Mot de passe :</label>
		<div class="col-sm-10">
			<input type="password" class="form-control" name="mdp"/>
		</div>
	</div>
	<div class="form-group">
		<label for="mdp2" class="col-sm-2 control-label">Confirmation de votre mot de passe :</label>
		<div class="col-sm-10">
			<input type="password" class="form-control" name="mdp2"/>
		</div>
	</div>
	<div class="form-group">
		<label for="mail" class="col-sm-2 control-label">Votre adresse mail :</label>
		<div class="col-sm-10">
			<input type="email" name="mail" required="required" class="form-control" value="<?php if(isset($_POST['mail'])){echo $_POST['mail'];}?>"/>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<label class="radio-inline">
				<input type="radio" name="sexe" value="homme"> Homme
			</label>
			<label class="radio-inline">
				<input type="radio" name="sexe" value="femme"> Femme
			</label>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-default">S'inscrire</button>
		</div>
	</div>	
</form>


</div>



<?php include("squelettePage/footer.php"); ?>
</body>
</html>