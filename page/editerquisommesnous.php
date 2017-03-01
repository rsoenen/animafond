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
	<?php include("squelettePage/menu.php");?>
	<div class= "col-md-8 col-md-offset-2">
		<?php
			include ("../manager/MembreConseilManager.php");
			$membreConseilManager = new MembreConseilManager();
			
			if(isset($_POST['ajouter'])&&isset($_SESSION['gererPageDiverse'])&&$_SESSION['gererPageDiverse']==true){ //AJOUTER UNE NOUVELLE PERSONNE
				echo '<div class="nouvpresentation"><table><form action="editerquisommesnous.php" method="POST" enctype="multipart/form-data"><table border="1">';
				echo '<input type="hidden" name="nouveau" value="true">';
				echo '<tr><td>Nom</td><td><input type="text" name="nom"/></td></tr>';
				echo '<tr><td>Prenom</td><td><input type="text" name="prenom"/></td></tr>';
				echo '<tr><td>Fonction</td><td><input type="text" name="role"/></td></tr>';
				echo '<tr><td>Position</td><td><input type="number" name="position"/></td></tr>';
				echo '<tr><td>Photo</td><td><input type="file" name="monfichier" /></td></tr>';
				echo '<tr><td colspan="3" text-align="center"><input type="submit" value="Enregistrer"/></td></tr></form>';
				echo '</table></div>';	
			}
			if(isset($_POST['position'])){ //EDITER UN PROFIL EXISTANT
				
				$membreUpdate = new MembreConseil();
				$membreUpdate -> updateMembre($_POST["role"],$_POST["nom"], $_POST["prenom"],$_POST["position"]);
				
				$membreConseilManager-> updateMembreConseil($membreUpdate);

				echo 'Modification effectuée<br/>';
				echo '<a href="quisommesnous.php">Revenir à la page Qui SOMMES NOUS</a>';
				
			}
			
			if(isset($_POST['nouveau'])){ //AJOUT D'UNE NOUVELLE PERSONNE
				$newMembre = new MembreConseil();
				$newMembre -> updateMembre($_POST["role"],$_POST["nom"], $_POST["prenom"],$_POST["position"]);
				
				$membreConseilManager-> addMembreConseil($newMembre);
				
				echo '<a href="quisommesnous.php">Revenir à la page Qui SOMMES NOUS</a>';
			}
			
			if (isset($_POST['supprimer'])){ //SUPPRESSION D'UNE PERSONNE
				
				$membreDelete = new MembreConseil();
				$membreDelete -> updateMembre($_POST["role"],$_POST["nom"], "",0);
				$membreDelete -> setImage($_POST["image"]);
				
				$membreConseilManager-> deleteMembreConseil($membreDelete);
				
				echo 'Suppression effectuée<br/>';
				echo '<a href="quisommesnous.php">Revenir à la page Qui SOMMES NOUS</a>';
				
			}
			
			if (isset($_POST['updatePicture'])){
				$membreUpdate = new MembreConseil();
				$membreUpdate -> updateMembre($_POST["role"],$_POST["nom"], $_POST["prenom"],0);
				$membreUpdate -> setImage($_POST["updatePicture"]);
				
				
				$membreConseilManager-> updatePicture($membreUpdate);

				echo 'Image modifiée<br/>';
				echo '<a href="quisommesnous.php">Revenir à la page Qui SOMMES NOUS</a>';
			}
			
			
			
			echo '</div>';
			include("squelettePage/footer.php");
		?>
	
</body>
</html>