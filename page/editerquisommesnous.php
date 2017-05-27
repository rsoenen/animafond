<!DOCTYPE html>
<?php session_start(); ?>
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
	<div id="mainDiv" class= "col-md-8 col-md-offset-2">
		<?php
			include ("../manager/MembreConseilManager.php");
			$membreConseilManager = new MembreConseilManager();
			$membreConseilManager->setDb($mainManager->getDb());


		if(isset($_POST['ajouter'])&&isset($_SESSION['gererPageDiverse'])&&$_SESSION['gererPageDiverse']==true){ ?>
				<div class="nouvpresentation col-md-6 col-md-offset-3"><form action="editerquisommesnous.php" method="POST" enctype="multipart/form-data">
						<input type="hidden" name="nouveau" value="true">
						<div class="form-group">
							<label class="col-sm-2 control-label" for="name">Nom</label>
							<input type="text" name="nom"/>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label" for="prenom">Prenom</label>
							<input type="text" name="prenom"/>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label" for="role">Fonction</label>
							<input type="text" name="role"/>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label" for="position">Position</label>
							<input type="text" name="position"/>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label"for="monfichier">Photo</label>
							<input type="file" name="monfichier"/>
						</div>
				<input type="submit" class="btn btn-default" value="Enregistrer"/></form>
				</div>
			<?php
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