<!DOCTYPE html>
<?php session_start();?>
<html>
<head>
	<meta charset="utf-8"/>  <!-- norme html 5 -->
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../css/style_menu.css">
	<link rel="stylesheet" type="text/css" href="../css/style_index.css">
	<title> Site d'anima'fond, une association de cirque </title>
</head>
<body>
	<?php include("squelettePage/menu.php");?>
	<div class= "col-md-8 col-md-offset-2" id="mainDiv">
	
	<h1>HISTORIQUE</h1>
	<img id="logoQuiSommesNous" src="../image/quisommesnous/ancienlogo.gif"/>
	<p>Créée en 1997 par cinq copains jongleurs, l'idée était de pouvoir continuer à jongler après le Lycée.<br/><br/>
	Après dix-sept ans d'existence, Anim'A Fond anime un atelier le samedi matin où petits et grands peuvent s'adonner aux joies de la jonglerie (assiettes chinoises, balles, diabolos, bâtons du diable, foulards, massues, boites à cigares, bollas, ...), de l'équilibre (fil, boule, monocycle, biclown, échasses, ...) et de l'acrobatie.<br/><br/> Anim'à fond, c'est aussi le monobasket (basket sur monocycle) et mono hockey (hockey sur monocycle). Plus fraîchement présente au sein de notre association, cette section a déjà bien fait parler d'elle en organisant le premier tournoi de mono basket en France. Ce tournoi est le plus important de la ligue nationale de monobasket.<br/><br/>
Enfin, Anim'à fond, c'est aussi des animations de jonglerie, des animations médiévales, des spectacles de sculpture sur ballons, des décorations ballons pour salle ou extérieur, des démonstrations de monobasket, de freestyle, des ateliers maquillage... Bref, toujours de quoi vous épater...
</p>
	
	<h1 class="conseiladmini">CONSEIL D'ADMINISTRATION</h1>
	<?php

		include ("../manager/DateConseilAdministrationManager.php");
		$dateConseilAdministrationManager = new DateConseilAdministrationManager();
		$dateConseilAdministrationManager->setDb($mainManager->getDb());

		include ("../manager/MembreConseilManager.php");
		$membreConseilManager = new MembreConseilManager();
		$membreConseilManager->setDb($mainManager->getDb());
		$listeMembreConseil = $membreConseilManager -> getListMembreConseil();


	$pathPicture = $membreConseilManager -> getPathPicture();
		
		if(!(isset($_POST['edition'])&&isset($_SESSION['gererPageDiverse'])&&$_SESSION['gererPageDiverse']==true)){ //affichage normal
			if(isset($_POST['newdateconseil'])){
				$newDateConseilAdministration = new DateConseilAdministration();
				$newDateConseilAdministration ->setDateConseil($_POST["newdateconseil"]);
				$dateConseilAdministrationManager->updateDateConseilAdministration($newDateConseilAdministration);

			}
			$dateConseilAdministration = new DateConseilAdministration();
			$dateConseilAdministration = $dateConseilAdministrationManager->getDateConseilAdministration();
			echo '<p class="dateconseil" align="center">Conseil d\'administration élu lors de l\'assemblée générale du '.$dateConseilAdministration->getDateConseil().'</p>';
			if(isset($_SESSION['gererPageDiverse'])&&$_SESSION['gererPageDiverse']==true&&!isset($_POST['modifierdate'])){
				echo '<form action="quisommesnous.php" method="POST"><input type="hidden" name="modifierdate" value="true"/><input class="btn btn-default" type="submit" value="modifier la date de l\'AG"/></form>';
			}
			if(isset($_POST['modifierdate'])){
				echo 'Le dernier conseil d\'administration s\'est déroulé le <form action="quisommesnous.php" method="POST"><input type="text" name="newdateconseil"/><input type="submit" class="btn btn-default" value="Enregistrer les modifications"/></form>';
			}
			
			echo '<table class="col-md-12" >';$c=0;
			foreach ($listeMembreConseil as $data){ //LISTE DES MEMBRES DU CONSEIL
				if($c==0){echo '<tr>';}
				echo '<td><div class="presentation"><table align="center">';
				echo '<tr><td><img class="photoConseil" src="'.$pathPicture.$data->getImage().'" alt="'.$data->getRole().'"/></td></tr>';
				echo "<tr><td><b>".$data->getPrenom()." ".$data->getNom()."</b></td></tr>";
				echo "<tr><td>".$data->getRole()."</td></tr></table></div></td>";$c++;
				if($c==3){echo '</tr>';$c=0;}
			}
			if ($c!=0){echo '</tr>';}
			echo '</table>';
			if (isset($_SESSION['gererPageDiverse'])&&$_SESSION['gererPageDiverse']==true){
				echo '<form action="quisommesnous.php" method="POST"><input type="hidden"  name="edition" value="true"><input class="btn btn-default" type="submit" value="Editer les profils"></form>';
			}
		}
		else {	//editer profil
			$dateConseilAdministration = new DateConseilAdministration();
			$dateConseilAdministration = $dateConseilAdministrationManager->getDateConseilAdministration();

			echo '<p align="center">Conseil d\'administration élu lors de l\'assemblée générale du '.$dateConseilAdministration->getDateConseil().'</p>';
			if(isset($_SESSION['gererPageDiverse'])&&$_SESSION['gererPageDiverse']==true){
			echo '<form action="quisommesnous.php" method="POST"><input type="hidden" name="modifierdate" value="true"/><input class="btn btn-default" type="submit" value="modifier"/></form>';
			}
			echo '<table class="tablequisommesnous">';$c=0;
			foreach ($listeMembreConseil as $data){
				if($c==0){echo '<tr>';}
				echo '<td><div class="presentation" align="center" ><table><form action="editerquisommesnous.php" method="POST"><table border="1">';
				echo '<tr><td colspan="2"><img width="200" height="300" src="'.$pathPicture.$data->getImage().'" alt="'.$data->getRole().'"/></td></tr>';
				echo '<td>Nom</td><td><input type="hidden" name="nom" value="'.$data->getNom().'"/>'.$data->getNom().'</td></tr>';
				echo '<tr><td>Prénom</td><td><input type="hidden" name="prenom" value="'.$data->getPrenom().'"/>'.$data->getPrenom().'</td></tr>';
				echo '<tr><td>Fonction</td><td><input type="text" name="role" value="'.$data->getRole().'"/></td></tr>';
				echo '<tr><td>Position</td><td><input type="number" name="position" value="'.$data->getPosition().'"/></td></td>';
				echo '<tr><td colspan="2" text-align="center"><input type="submit" class="btn btn-default" value="Enregistrer les modifications"/></form>';
				echo '<form action="editerquisommesnous.php" method="POST"><input type="hidden" name="role" value="'.$data->getRole().'"/><input type="hidden" name="nom" value="'.$data->getNom().'"/><input type="hidden" name="image" value="'.$data->getImage().'"/><input type="hidden" name="supprimer" value="true"/><input type="submit"class="btn btn-default"  value="Supprimer cette personne"></form></td></tr>';
				echo '<tr><td colspan="2"><form action="editerquisommesnous.php" method="POST" enctype="multipart/form-data"><p>Changer d\'image<br/><input type="file" name="monfichier"/><br/><input type="hidden" name="updatePicture" value="'.$data->getImage().'"/><input type="hidden" name="role" value="'.$data->getRole().'"/><input type="hidden" name="nom" value="'.$data->getNom().'"/><input type="hidden" value="'.$data->getPrenom().'" name="prenom"/><input class="btn btn-default" type="submit" value="Envoyer le fichier"/></p></form></td></tr>';
				echo '</table></div></td>';$c++;
				if($c==3){echo '</tr>';$c=0;}
			}
			if ($c!=0){echo '</tr>';}
			echo '</table>';
			echo '<form method="POST" action="editerquisommesnous.php"><input type="hidden" name="ajouter" value="true"/><input type="submit" class="btn btn-default" value="Ajouter une nouvelle personnne"/></form>';
		}
		echo '</div>';
		include("squelettePage/footer.php");
	?>

</body></html>