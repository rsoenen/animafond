<!DOCTYPE html>
<?php session_start(); ?>
<html xmlns="http://www.w3.org/1999/html">
<head>
	<meta charset="utf-8"/>  <!-- norme html 5 -->
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../css/style_menu.css">
	<link rel="stylesheet" type="text/css" href="../css/style_index.css">

	<title> Site d'anima'fond, une association de cirque </title>
</head>
<body>

<?php

	include("squelettePage/menu.php");
	echo '<div id="mainDiv" class= "col-md-8 col-md-offset-2">';
	if (isset($_POST['pseudoConnection'])){  // Test connection
		
		include ("../manager/UtilisateurManager.php");
		$utilisateurManager = new UtilisateurManager();
		$utilisateurManager->setDb($mainManager->getDb());


		include ("../manager/RangManager.php");
		$rangManager = new RangManager();
		$rangManager->setDb($mainManager->getDb());


		$pseudo=$_POST['pseudoConnection'];	
		$mdphache=sha1($_POST['mdp']);
		
		$utilisateur = $utilisateurManager->searchUtilisateur($pseudo);
		
		
		if (!empty($utilisateur) && $mdphache == $utilisateur->getMdp()){   // PASSAGE DES INFORMATIONS DE L'UTILISATEUR EN VARIABLE DE SESSION
			$_SESSION['ouverte']=true;
			$_SESSION['pseudo']=$utilisateur->getPseudo();
			$_SESSION['rang']=$utilisateur->getRang();
			
			$rangManager -> updateDroit($_SESSION['rang']);
			
			$utilisateurManager-> updateLastConnexion($utilisateur);
			echo "<p align='center'>Vous êtes bien connect&eacute; sous le pseudo de ".$_SESSION['pseudo'].".<br/>";
			echo "<a href='index.php'>Retourner à l'accueil</a></p>";
		} else {
			echo 'Combinaison pseudo/mot de passe fausse';
		}
	}


	if(isset($_POST['mailContact'])){	//Confirmation envoie message via Contact	
       
		include ("../manager/ContactManager.php");
		$contactManager = new ContactManager();
		$contactManager->setDb($mainManager->getDb());


		$newContact= new Contact();
		$newContact->setPseudo($_POST["name"]);
		$newContact->setContenu($_POST["contenu"]);
		$newContact->setMail($_POST["mailContact"]);
		$newContact->setIpPosteur($_SERVER["REMOTE_ADDR"]);
		$newContact->setObjet($_POST["objet"]);
		
		$contactManager -> add ($newContact);
		
		$nom=$_POST['nom'];
		$mailcontact=$_POST['mailContact'];
		include ("../fonction/MailContact.php");
		echo '<h3>Le message a bien &eacute;t&eacute; envoy&eacute;</h3>';
	}

	echo "<br/><h3><a href='index.php'>Aller à l'accueil</a></h3></p>";
	include("squelettePage/footer.php");

?>
</div>
</body>
</html>