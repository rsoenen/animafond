<!DOCTYPE html>
<?php session_start(); ?>
<html>
<head>
	<meta charset="utf-8"/>  <!-- norme html 5 -->
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../css/style_menu.css">
	<link rel="stylesheet" type="text/css" href="../css/style_connexion.css">
	<title> Site d'anima'fond, une association de cirque </title>
</head>
<body>

<?php include("squelettePage/menu.php");
	echo '<div id="mainDiv" class= "col-md-8 col-md-offset-2">';
	
	include ("../manager/UtilisateurManager.php");
	$utilisateurManager = new UtilisateurManager();
	
	
	if(isset($_SESSION['pseudo'])){
		if(isset($_POST['editionprofil'])){ //UPDATE L'ADRESSE MAIL
			$utilisateurManager->updateMail($_SESSION['pseudo'], $_POST['newmail']);
			
			echo '<p align="center"><u>Informations modifiées</u></p>';
		}
		if(isset($_POST['editionmdp'])){ //EDTION MDP SI CONDITION REUNI
			
			$utilisateurMDP = new Utilisateur();
			$utilisateurMDP = $utilisateurManager -> searchUtilisateur($_SESSION['pseudo']);
			
			$verifmdp=sha1($_POST['exmdp']);
			if(isset($_POST['newmdp'])&&($verifmdp==$utilisateurMDP.getMdp())&&($_POST['newmdp']==$_POST['newmdpconf'])&&(strlen($_POST['newmdp'])>5)){
				$newmdp=sha1($_POST['newmdp']);
				$utilisateurMdp.setMdp($newmdp);
				$utilisateurManager->updateMdp($utilisateurMdp);
				
				echo '<p align="center"><u>Mot de passe modifié</u></p>';
			}
			else if(!isset($_POST['newmdp'])){
				echo '<p align="center">Vous n\'avez pas rentr&eacute; de mot de passe</p>';
				$_POST['modifiermdp']=true;
			}
			else if($verifmdp!=$row2['mdp']){
				echo '<p align="center">Le mot de passe que vous avez rentr&eacute; ne correspond pas à votre mot de passe actuel</p>';
				$_POST['modifiermdp']=true;
			}
			else if($_POST['newmdp']!=$_POST['newmdpconf']){
				echo '<p align="center">Les deux mots de passes que vous avez rentr&eacute;s sont diff&eacute;rents. Merci de rentrer deux fois votre nouveau mot de passe</p>';
				$_POST['modifiermdp']=true;
			}
			else if(strlen($_POST['newmdp'])<6){
				echo '<p align="center">Votre mot de passe doit comporter au moins 6 caractères</p>';
				$_POST['modifiermdp']=true;
			}
			$requete2->closeCursor();
		}
		
		$utilisateur = new Utilisateur();
		$utilisateur = $utilisateurManager -> searchUtilisateur($_SESSION['pseudo']);
		
		
		if(!isset($_POST['modifierprofil'])&&!isset($_POST['modifiermdp'])){ //AFFICHAGE PAR DEFAULT
			echo '<table class="monprofil"><tr><td><b>Pseudo :</b></td><td>'.$utilisateur->getPseudo().'</td></tr>';
			echo '<tr><td><b>Rang :</b></td><td>'.$utilisateur->getRang().'</td></tr>';
			echo '<tr><td><b>Adresse mail :</b></td><td>'.$utilisateur->getMail().'</td></tr>';
			echo '<tr><td><form method="POST" action="monprofil.php"><input type="hidden" name="modifierprofil" value="true"/><input type="submit" value="Modifier mon mail"/></form></td>';
			echo '<td><form method="POST" action="monprofil.php"><input type="hidden" name="modifiermdp" value="true"/><input type="submit" value="Modifier mon mot de passe"/></form></td></tr></table>';
		}
		if(isset($_POST['modifierprofil'])){ //SI ON VEUT MODIFIER LE PROFIL
			echo '<form action="monprofil.php" method="POST"><input type="hidden" name="editionprofil" value="true">';
			echo '<table class="monprofil"><tr><td><b>Pseudo :</b></td><td>'.$utilisateur->getPseudo().'</td></tr>';
			echo '<tr><td><b>Rang :</b></td><td>'.$utilisateur->getRang().'</td></tr>';
			echo '<tr><td><b>Adresse mail :</b></td><td><input type="mail" name="newmail" value="'.$utilisateur->getMail().'"/></td></tr>';
			echo '<tr><td colspan="2"><input type="submit" value="Enregistrer les modifications"/></td></tr></table></form>';
		}
		
		if(isset($_POST['modifiermdp'])){ //SI ON VEUT MODIFIER LE MDP
			echo '<form action="monprofil.php" method="POST"><input type="hidden" name="editionmdp" value="true">';
			echo '<table class="monprofil"><tr><td>Entrez votre mot de passe actuel</td><td><input type="password" name="exmdp"></td></tr>';
			echo '<tr><td>Entrez le nouveau mot de passe</td><td><input type="password" name="newmdp">(6 caractères minimum)</td></tr>';
			echo '<tr><td>Confirmez le nouveau mot de passe</td><td><input type="password" name="newmdpconf"></td></tr>';
			echo '<tr><td colspan="2"><input type="submit" value="Changer le mot de passe"></td></tr></table></form>';
		}
		
		
	} else {
		echo 'Vous devez vous connecter pour acc&eacute;der à cette page';
	}
	
	include("squelettePage/footer.php");
	
?>


</div>
</body>
</html>