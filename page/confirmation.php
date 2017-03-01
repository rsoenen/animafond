<!DOCTYPE html>
<?php session_start(); ?>
<html>
<head>
	<meta charset="utf-8"/>  <!-- norme html 5 -->
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../css/style_menu.css">
	<title> Site d'anima'fond, une association de cirque </title>
</head>
<body>

<?php 
	
	if (isset($_POST['pseudoConnection'])){  // Test connection
		
		include ("../manager/UtilisateurManager.php");
		$utilisateurManager = new UtilisateurManager();
		
		include ("../manager/RangManager.php");
		$rangManager = new RangManager();
		
		$pseudo=$_POST['pseudoConnection'];	
		$mdphache=sha1($_POST['mdp']);
		
		$utilisateur = $utilisateurManager->searchUtilisateur($pseudo);
		
		
		if (!empty($utilisateur) && $mdphache == $utilisateur->getMdp()){   // PASSAGE DES INFORMATIONS DE L'UTILISATEUR EN VARIABLE DE SESSION
			$_SESSION['ouverte']=true;
			$_SESSION['pseudo']=$utilisateur->getPseudo();
			$_SESSION['rang']=$utilisateur->getRang();
			
			$rangManager -> updateDroit($_SESSION['rang']);
			
			$utilisateurManager-> updateLastConnexion($utilisateur);
			echo "<p align='center'>Vous êtes bien connecté sous le pseudo de ".$_SESSION['pseudo'].".<br/>";
			echo "<a href='index.php'>Retourner à l'accueil</a></p>";
		} else {
			echo 'Combinaison pseudo/mot de passe fausse';
		}
		
		
	}



	include("squelettePage/menu.php");

	if(isset($_POST['mailContact'])){	//Confirmation envoie message via Contact	
       
		include ("../manager/ContactManager.php");
		$contactManager = new ContactManager();

		$newContact= new Contact();
		$newContact->setPseudo($_POST["nom"]);
		$newContact->setContenu($_POST["contenu"]);
		$newContact->setMail($_POST["mailContact"]);
		$newContact->setIpPosteur($_SERVER["REMOTE_ADDR"]);
		$newContact->setObjet($_POST["objet"]);
		
		$contactManager -> add ($newContact);
		
		$nom=$_POST['nom'];
		$mailcontact=$_POST['mailContact'];
		//include ("../fonction/MailContact.php");
		echo 'Le message a bien &eacute;t&eacute; envoy&eacute;';
		echo "<a href='index.php'>Retourner à l'accueil</a></p>";
	} 
	
	
	include("squelettePage/footer.php");

?>

</body>
</html>