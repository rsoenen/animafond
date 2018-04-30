<!DOCTYPE html>
<?php session_start(); ?>
<html>
<head>
	<meta charset="utf-8"/>  <!-- norme html 5 -->
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../css/style_menu.css">
	<link rel="stylesheet" type="text/css" href="../css/style_partenaire.css"/>
	<title> Site d'anima'fond, une association de cirque </title>
</head>
<body>
	<?php include("squelettePage/menu.php");?>
	<div id="mainDiv" class="col-md-8 col-md-offset-2">
	<?php
		if(isset($_POST['ajoutpartenaire'])&&$_SESSION['gererPageDiverse']&&$_SESSION['gererPageDiverse']==true){ //FORMULAIRE POUR L'AJOUT D'UN PARTENAIRE
			echo '<div class="row" id="editPartenaire"><table class="col-md-8 col-md-offset-3"><form enctype="multipart/form-data" method="POST" action="editerpartenaire.php">';
			echo '<tr><td>Nom du partenaire</td><td><input type="text" name="nouvpartenaire"></td></tr>';
			echo '<tr><td>Site du partenaire</td><td><input type="text" name="site"></td></tr>';
			echo '<tr><td>Statut du partenaire</td><td><select name="statut"><option value="officiel">Partenaires officiels</option><option value="sportif">Monocycles sportifs</option><option value="materiel">Achats materiels</option></select></td></tr>';
			echo '<tr><td>Ajouter un logo</td><td><input type="file" name="monfichier"/></td></tr>';
			echo '<tr><td colspan="2"><input type="submit" class="btn btn-default" value="Enregistrer les modifications"></td></tr>';
			echo '</form></table></div>';
		}
		
		include ("../manager/PartenaireManager.php");
		$partenaireManager = new PartenaireManager();
		$partenaireManager->setDb($mainManager->getDb());


	if(isset($_POST['site'])&&isset($_POST['nouvpartenaire'])&&$_SESSION['gererPageDiverse']&&$_SESSION['gererPageDiverse']==true){ //AJOUT D'UN PARTENAIRE
			
			$partenaire = new Partenaire();
			$partenaire -> updatePartenaire($_POST['nouvpartenaire'], $_POST['site'], $_POST['statut']);
			
			$partenaireManager -> addPartenaire($partenaire);
			
			echo "Le partenaire ".$partenaire->getNom()." a bien été ajouté !<br/>";
			
		}
		
		if(isset($_POST['partenaire'])&&$_SESSION['gererPageDiverse']&&$_SESSION['gererPageDiverse']==true){ //FORMULAIRE POUR EDITER UN PARTENAIRE
			
			$partenaire = $partenaireManager -> partenaireByName($_POST["partenaire"]);
			
			
			echo '<div class="row" id="editPartenaire"><table class="col-md-8 col-md-offset-3"><form enctype="multipart/form-data" method="POST" action="editerpartenaire.php">';
			echo '<tr><td>Nom du partenaire</td><td><input type="hidden" name="nom" value="'.$partenaire->getNom().'"/>'.$partenaire->getNom().'</td></tr>';
			echo '<tr><td>Site du partenaire</td><td><input type="text" name="site" value="'.$partenaire->getLien().'"></td></tr>';
			echo '<tr><td>Modifier le logo</td><td><input type="file" name="monfichier"/></td></tr>';
			echo '<tr><td colspan="2" text-size="8px"><i>Si vous ne souhaitez pas modifier le logo, ne mettez pas de nouveau fichier</i></td></tr>';
			echo '<tr><td>Statut du partenaire</td><td><select name="statut"><option value="officiel"';if($partenaire->getStatut()=="officiel"){echo 'selected="seleted"';}echo '>Partenaires officiels</option><option value="sportif"';if($partenaire->getStatut()=="sportif"){echo 'selected="seleted"';}echo '>Monocycles sportifs</option><option value="materiel"';if($partenaire->getStatut()=="materiel"){echo 'selected="seleted"';}echo '>Achats materiels</option></select></td></tr>';
			echo '<input type="hidden" name="editer" value="'.$partenaire->getNom().'"/>';
			echo '<tr><td colspan="2"><input type="submit" class="btn btn-default" value="Editer ce partenaire"></td></tr>';
			echo '</form></table></div>';

			
		}
		if(isset($_POST['editer'])&&$_SESSION['gererPageDiverse']&&$_SESSION['gererPageDiverse']==true){ //UPDATE BDD AVEC CHANGEMENT IMAGE
			$partenaire = new Partenaire();
			$partenaire -> updatePartenaire($_POST['nom'],$_POST['site'],$_POST['statut']);
			$partenaire -> setImage('monfichier');
			$partenaireManager -> updatePartenaire($partenaire);
			
			echo "L'envoi a bien été effectué !<br/>";
			
		}
		
		if(isset($_POST['suppartenaire'])&&$_SESSION['gererPageDiverse']&&$_SESSION['gererPageDiverse']==true){ //SUPPRIMER UN PARTENAIRE
			echo "Image";
			$partenaire = new Partenaire();
			$partenaire -> setImage($_POST['image']);
			$partenaire -> setNom($_POST['suppartenaire']);
			
			$partenaireManager -> deletePartenaire($partenaire);
			
			echo 'Le partenaire '.$partenaire.getNom().' a bien été supprimé<br/>';
		}
		
		echo '<a href="index.php">Retourner à l\'accueil</a><br/>';
		echo '<a href="partenaire.php">Retourner à la page partenaire</a>';
		
		include("squelettePage/footer.php");
	?>
	</div>
</body>
</html>